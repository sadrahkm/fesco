<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Utility\Cart;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        return view("admin.categories.create");
    }
    public function store(Request $request)
    {
        $this->validate($request,[
            "catName" => "required|min:3"
        ],[
            "catName.required" => "وارد کردن نام دسته بندی الزامی می باشد.",
            "catName.min" => "نام دسته بندی باید حداقل 3 کاراکتر باشد.",
        ]);
        $isCatExists = Category::where("name",$request->input("catName"))->first();
        if($isCatExists && $isCatExists instanceof Category){
            return redirect()->refresh()->with("error","این دسته بندی قبلا وجود دارد");
        }
        $result = Category::create([
            "name" => $request->input("catName")
        ]);
        if($result){
            return redirect()->route("admin.categories.index")->with("success","دسته بندی با موفقیت اضافه گردید.");
        }
    }
}
