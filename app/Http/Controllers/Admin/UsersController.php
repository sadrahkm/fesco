<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index()
    {
        $users = \App\User::all();
        return view("admin.users.index",compact("users"))->with("panel_title","لیست کاربران");
    }

    public function create()
    {
        return view("admin.users.create")->with("panel_title","افزودن کاربر جدید");
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            "username" => "required",
            "email" => "required|email",
            "password" => "required",
            "password2" => "required",
            "phone" => "required",
            "address" => "required",
        ],[
            "username.required" => "وارد کردن نام الزامی می باشد.",
            "email.required" => "وارد کردن ایمیل الزامی می باشد.",
            "email.email" => "ایمیل نامعتبر می باشد.",
            "password.required" => "وارد کردن رمز عبور الزامی می باشد.",
            "password2.required" => "وارد کردن تکرار رمز عبور الزامی می باشد.",
            "phone.required" => "وارد کردن تلفن الزامی می باشد.",
            "address.required" => "وارد کردن آدرس الزامی می باشد.",
        ]);
        if($request->input("password") != $request->input("password2")){
            return redirect()->refresh()->with("error","تکرار رمز عبور یکسان نمی باشد.");
        }
        $data = [
            "name" => $request->input("username"),
            "email" => $request->input("email"),
            "phone" => $request->input("phone"),
            "address" => $request->input("address"),
            "password" => $request->input("password")
        ];
        $result = User::create($data);
        if($result){
            return redirect()->route("admin.users.index")->with("success","کاربر با موفقیت ایجاد شد.");
        }
        return redirect()->refresh()->with("error","مشکلی در ایجاد کاربر وجود دارد.");
    }
}
