<?php


namespace App\Utility;


use App\Models\Food;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class RegisterOrder
{
    public static function RegisterOrder()
    {
        $food_ids = session()->get('cart');
        $final_price = session('finalPrice');
        $foodsJson = json_encode($food_ids);
        $user = Auth::user();
        $order = new Order([
            'food_id' => $foodsJson,
            'price' => $final_price,
            'status' => '0',
        ]);
        $result = $user->orders()->save($order);
        if ($result) {
            Cart::clearCart();
            self::increaseFoodOrderCount($food_ids);
            self::increaseUserOrderCount($user);
            return true;
        }
        return false;
    }

    public static function increaseUserOrderCount($user)
    {
        $user_order_count = $user->order_count;
        $user_order_count += 1;
        $user->update([
            'order_count' => $user_order_count,
        ]);
        $user->save();
    }

    public static function increaseFoodOrderCount($food_ids)
    {
        foreach ($food_ids as $id => $iterate) {
            $foodItem = Food::find($id);
            $order_count = $foodItem->order_count + 1;
            $foodItem->update([
                'order_count' => $order_count,
            ]);
            $foodItem->save();
        }
    }
}
