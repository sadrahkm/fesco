<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Services\Gateways\Mellat;
use App\Utility\RegisterOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    private $mellatGateway;

    public function __construct()
    {
        $this->mellatGateway = new Mellat();
    }

    public function verify(Request $request)
    {
        if ($request->has('ResCode')) {
            $params['ResCode'] = $request->input('ResCode');
            $params['SaleOrderId'] = $request->input('SaleOrderId');
            $params['saleReferenceId'] = $request->input('saleReferenceId');
            $result = $this->mellatGateway->verifyPayment($params);
            if($result['success']){
                RegisterOrder::RegisterOrder();
                return redirect()->route('frontend.cart.verifyPage');
            }
        }
    }

    public function verifyPage()
    {
        if(RegisterOrder::RegisterOrder()){
            $user = Auth::user();
            return view('frontend.payment.verify',compact('user'));
        }
        return redirect('cart/checkout')->with('error','مشکلی در ثبت سفارش وجود دارد.');
    }
}
