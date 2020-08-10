<?php


namespace App\Utility;


use App\Models\Food;
use App\Models\Order;
use App\User;
use Illuminate\Support\Facades\Auth;

class OrderFoods
{
    public static function OrderFoods($order_id)
    {
        $user = Auth::user();
        $userOrder = $user->orders()->find($order_id);
        if ($userOrder && $userOrder instanceof Order) {
            $foods = $userOrder->food_id;
        } else {
            return "سفارشی با این مشخصات وجود ندارد.";
        }
        $foods = json_decode($foods,true);
        $foodItems = array();
        foreach ($foods as $id => $iterate){
            $foodItems[] = Food::find($id)->name;
        }
        return $foodItems;
    }
}
