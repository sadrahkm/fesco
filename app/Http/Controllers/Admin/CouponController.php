<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\DocBlock\Tags\Reference\Url;

class CouponController extends Controller
{
    public function index()
    {
        $coupons = Coupon::all();
        return view('admin.coupon.index', compact('coupons'))->with('panel_title', 'لیست کوپن ها');
    }

    public function create()
    {
        return view('admin.coupon.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'code' => 'required',
            'percent' => 'required|max:100|numeric'
        ], [
            'code.required' => 'وارد کردن کد تخفیف الزامی می باشد.',
            'percent.required' => 'وارد کردن درصد تخفیف الزامی می باشد.',
            'percent.max' => 'درصد تخفیف حداکثر باید 3 رقمی باشد.',
            'percent.numeric' => 'درصد تخفیف باید بصورت عددی وارد شود.',
        ]);
        $result = Coupon::create($request->except('_token'));
        if($result)
            return redirect()->route('admin.coupon.index')->with('success','کوپن جدید با موفقیت اضافه شد.');
        return redirect()->refresh()->with('error','مشکلی در اضافه کردن کوپن وجود دارد.');
    }
}
