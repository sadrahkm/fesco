<?php


namespace App\Services\Gateways;


use App\Models\Payment;
use Composer\DependencyResolver\Request;
use Illuminate\Support\Facades\Storage;
use nusoap_client;

class Mellat
{
    private $terminalId;
    private $userName;
    private $password;
    private $orderId;
    private $amount;
    private $callBackUrl;
    private $namespace = 'http://interfaces.core.sw.bps.com/';
    private $user_id;
    private $refCode;
    private $client;

    public function __construct()
    {
/*        $this->terminalId = config("gateways.mellat.terminalId");
        $this->userName = config("gateways.mellat.userName");
        $this->password = config("gateways.mellat.password");
        $this->callBackUrl = route('payment.verify');*/

    }

    public function doPayment(int $orderId, int $amount, int $user_id)
    {
        $this->amount = $amount;
        $this->orderId = $orderId;
        $this->user_id = $user_id;
        $this->client = new nusoap_client('https://bpm.shaparak.ir/pgwchannel/services/pgw?wsdl');
        $args = [
            'terminalId' => $this->terminalId,
            'userName' => $this->userName,
            'userPassword' => $this->password,
            'orderId' => $this->orderId,
            'amount' => $this->amount,
            'localDate' => date('Ymd'),
            'localTime' => date('Hms'),
            'additionalData' => '',
            'callBackUrl' => $this->callBackUrl,
            'payerId' => 0
        ];
        $response = $this->client->call('bpPayRequest', $args, $this->namespace);
        if ($response) {
            $resultOfResponse = explode(',', $response);
            if ($resultOfResponse[0] == "0") {
                $result = Payment::create([
                    'payment_user_id' => $this->user_id,
                    'payment_method' => Payment::ONLINE,
                    'payment_gateway_name' => 'ملت',
                    'payment_res_num' => $this->orderId,
                    'payment_amount' => $this->amount,
                    'payment_status' => Payment::INCOMPLETE
                ]);
                if ($result) {
                    $this->redirectToBank($resultOfResponse[1]);
                }
            }
            $fileJsonContent = [
                'user_id' => $this->user_id,
                'payment_order_id' => $this->orderId,
                'amount' => $this->amount,
                'error_id' => $resultOfResponse[0]
            ];
            $file = Storage::put('./Logs/Payments/' . date("Ymd_Hms") . $this->user_id . '.json',json_encode($fileJsonContent));
            return [
                'success' => false,
                'message' => "مشکلی در پرداخت وجود دارد.",
                'error_id' => $resultOfResponse[0],
            ];
        }
    }

    public function verifyPayment(array $params)
    {
        if($params['ResCode'] != "0"){
            return [
                'success' => false,
                'message' => 'پاسخ معتبری از بانک دریافت نشد.',
            ];
        }
        $args = [
            'terminalId' => $this->terminalId,
            'userName' => $this->userName,
            'userPassword' => $this->password,
            'orderId' => $this->orderId,
            'saleOrderId' => $params['saleOrderId'],
            'saleReferenceId' => $params['saleReferenceId'],
        ];
        $this->client = new nusoap_client('https://bpm.shaparak.ir/pgwchannel/services/pgw?wsdl');
        $response = $this->client->call('bpVerifyRequest', $args, $this->namespace);
        if(!$response || empty($response)){
            return [
                'success' => false,
                'message' => 'پرداخت شما تایید نگردید.',
            ];
        }
        $result = $response['return'];
        if($result != "0"){
            return [
                'success' => false,
                'message' => 'پرداخت شما تایید نگردید.',
            ];
        }
        $paymentItem = Payment::find($params['saleOrderId']);
        $paymentItem->payment_ref_num = $params['saleReferenceId'];
        $paymentItem->payment_status = Payment::COMPLETE;
        $settleResult = $this->client->call('bpSettleRequest',$args, $this->namespace);
        if($settleResult == "0"){
            return [
                'success' => true,
                'message' => 'پرداخت شما با موفقیت انجام شد.',
            ];
        }

    }

    public function redirectToBank($code)
    {
        ?>
        <form name='myform' action='https://bpm.shaparak.ir/pgwchannel/startpay.mellat' method='POST'>
            <input type='hidden' id='RefId' name='RefId' value='<?php echo $code; ?>'>
        </form>
        <script type='text/javascript'>
            window.onload = formSubmit;

            function formSubmit() {
                document.forms[0].submit();
            }
        </script>
        <?php
    }
}
