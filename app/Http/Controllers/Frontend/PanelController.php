<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\User;
use App\Utility\OrderFoods;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PanelController extends Controller
{

    public function info()
    {
        $user = User::find(Auth::id());
        if ($user && $user instanceof User) {
            return view("frontend.panel.editInfo", compact("user"));
        }
    }

    public function edit(Request $request, $user_id)
    {
        $this->validate($request, [
            "username" => "required",
            "email" => "required",
            "password" => "required|min:4",
            "phone" => "required",
            "address" => "required",
        ], [
            "username.required" => "وارد کردن نام الزامی می باشد.",
            "email.required" => "وارد کردن ایمیل الزامی می باشد.",
            "password.required" => "وارد کردن رمزعبور الزامی می باشد.",
            "password.min" => "رمزعبور باید حداقل 4 کاراکتر باشد.",
            "phone" => "وارد کردن تلفن الزامی می باشد.",
            "address" => "وارد کردن آدرس الزامی باشد.",
        ]);
        if ($request->input("password2") != $request->input("password")) {
            return redirect()->refresh()->with("error", "تکرار رمزعبور یکسان نمی باشد.");
        }
        $data = [
            "name" => $request->input("username"),
            "email" => $request->input("email"),
            "password" => $request->input("password"),
            "phone" => $request->input("phone"),
            "address" => $request->input("address"),
        ];
        $user = User::find($user_id);
        $result = $user->update($data);
        if ($result) {
            return redirect()->back()->with("success", "اطلاعات شما با موفقیت ویرایش گردید.");
        }
        return redirect()->refresh()->with("error", "مشکلی در ویرایش اطلاعات وجود دارد.");
    }

    public function orders()
    {
        $user = User::find(Auth::id());
        $orders = $user->orders()->get();
        return view("frontend.panel.order",compact("orders"));
    }

    public function reserves()
    {
        $user = User::find(Auth::id());
        $reserves = $user->reserves()->get();
        return view("frontend.panel.reserves",compact("reserves"));
    }

    public function orderFoods(Request $request)
    {
        $order_id = $request->input('order_id');
        $result = OrderFoods::OrderFoods($order_id);
        return $result;
    }
}
