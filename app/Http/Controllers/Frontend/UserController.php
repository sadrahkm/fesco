<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function showAuthPage()
    {
        return view("frontend.login.index");
    }


    public function doLogin(Request $request)
    {
        $this->validate($request, [
            "email" => "required",
            "password" => "required"
        ], [
            "email.required" => "وارد کردن ایمیل ضروری می باشد.",
            "password.required" => "وارد کردن رمزعبور ضروری می باشد.",
        ]);
        if (Auth::attempt(["email" => $request->input("email"), "password" => $request->input("password")])) {
            if ($request->input("type") == "register") {
                return true;
            }
            return redirect()->route("homepage");
        }
        dd("no");
        return redirect()->back()->with("error", "اطلاعات وارد شده نامعتبر است.");
    }

    public function doRegister(Request $request)
    {
        $this->validate($request, [
            "username" => "required",
            "email" => "required",
            "password" => "required|min:4|",
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
        $result = User::create($data);
        if ($result) {
            if ($this->doLogin($request)) {
                return redirect()->route("homepage");
            }
        }
        return redirect()->refresh()->with("error", "مشکلی در ثبت نام وجود دارد.");
    }

    public function logout(Request $request)
    {
        if (Auth::check()) {
            Auth::logout();
            \App\Utility\Cart::clearCart();
            return redirect()->route("homepage");
        }
    }

}
