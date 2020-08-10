<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use App\Utility\Cart;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    public function check(Request $request)
    {
        $code = $request->input('code');
        if ($code) {
            Cart::calculateCouponPrice($code, $discount, $final_price);
            return array($discount, $final_price);
        }
        return 'false';
    }
}
