<?php


namespace App\Utility;


use App\Models\Coupon;
use App\Models\Food;

class Cart
{
    static public function clearCart()
    {
        session()->forget('cart');
        session()->forget('totalPrice');
        session()->forget('discount');
        session()->forget('finalPrice');
        session()->forget('cart_lock');
    }

    static public function foodCartCollections()
    {
        if (session()->has('cart'))
            $food_ids = session()->get('cart');
        else
            $food_ids = array();
        $foodItems = array();
        if (sizeof($food_ids) > 0) {
            foreach ($food_ids as $id => $iterate) {
                $foodObject = Food::find($id);
                $foodItems[$id] = ['iterate' => $iterate, 'item' => $foodObject];
            }
        }
        return $foodItems;
    }

    static public function calculatePriceCartItems($foodItems)
    {
        $totalPrice = 0;
        foreach ($foodItems as $id => $foodItem) {
                $totalPrice += $foodItem['item']->price * $foodItem['iterate'];
        }
        session()->put('cart_price', $totalPrice);
        session()->save();
        return $totalPrice;
    }

    static public function calculateCouponPrice($code, &$discount, &$final_price)
    {
        $couponItem = Coupon::where('code', $code)->first();
        $total_price = session()->get('cart_price');
        if ($couponItem && $couponItem instanceof Coupon) {
            $percent = $couponItem->percent;
            $discount = ($percent / 100) * $total_price;
        } else
            $discount = 0;
        $final_price = $total_price - $discount;
        session()->put('discount', $discount);
        session()->put('finalPrice', $final_price);
        session()->save();
    }
}
