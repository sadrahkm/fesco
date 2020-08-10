<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Food;
use Illuminate\Http\Request;

class FoodsController extends Controller
{
    public function index()
    {
        $foods = Food::all();
        return view("admin.foods.index", compact("foods"))->with("panel_title", "لیست غذاها");
    }

    public function create()
    {
        $categories = Category::all();
        return view("admin.foods.create", compact('categories'))->with("panel_title", "افزودن غذای جدید");
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            "name" => "required",
            "price" => "required",
        ], [
            "name.required" => "وارد کردن نام غذا الزامی می باشد.",
            "price.required" => "وارد کردن قیمت غذا الزامی می باشد.",
        ]);
        $file = $request->file("picture");
        if ($request->has('isSpecial')) {
            $special = '1';
        } else {
            $special = '0';
        }
        $newFileName = $file->getClientOriginalName();
        $savePicture = $file->move(public_path("img/"), $newFileName);
        $fileItem = new Food([
            'special' => $special,
            "name" => $request->name,
            "price" => $request->price,
            "compounds" => $request->compounds,
            "file_name" => $request->file("picture")->getClientOriginalName(),
        ]);
        $category = Category::find($request->input('category'));
        $category->foods()->save($fileItem);
        if ($fileItem) {
            return redirect()->route("admin.foods.index")->with("success", "غذای جدید با موفقیت اضافه شد.");
        }
        return redirect()->refresh()->with("error", "مشکلی در اضافه کردن غذای جدید وجود دارد.");
    }
}
