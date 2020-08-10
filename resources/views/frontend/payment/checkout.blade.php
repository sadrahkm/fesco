@extends('layouts.report')
@section('content')
    <div class="col-md-12 col-lg-12">
        <div id="checkout" class="pagesBox">
            <div class="head">بررسی نهایی</div>
            <ul>
                <li>
                    <span>نام گیرنده : </span>
                    <span>{{ $user->name }}</span>
                </li>
                <li>
                    <span> تلفن گیرنده : </span>
                    <span>{{ $user->phone }}</span>
                </li>
                <li>
                    <span id="foodListCheckout">لیست غذاها<i class="fas fa-angle-down"></i> </span>
                    <ul id="listOfFoods">
                        @foreach($userFoods as $foodItem)
                            <li>{{ $foodItem['item']->name }}</li>
                        @endforeach
                    </ul>
                </li>
                <li>
                    <span>آدرس گیرنده : </span>
                    <span>{{ $user->address }}</span>
                </li>
            </ul>
            <div class="priceBox checkoutPrice">
                <div class="price">
                    <span>قیمت بدون تخفیف : </span>
                    <span>{{ $prices['totalPrice'] }} هزار تومان</span>
                </div>
                <div class="price off">
                    <span>تخفیف : </span>
                    <span>{{ $prices['discount'] }} هزار تومان</span>
                </div>
                <div class="price">
                    <span>قیمت نهایی</span>
                    <span>{{ $prices['finalPrice'] }} هزار تومان</span>
                </div>
                <div class="clear"></div>
            </div>
            <form action="{{ route('frontend.cart.verifyPage') }}" method="get" style="text-align: center">
                <input type="submit" value="پراخت نهایی" style="display: inline; margin: 0;" class="btn btnCream">
                <button class="btn cancelBtn">برگشت به سبد خرید <i class="fas fa-angle-left"></i></button>
            </form>
        </div>
    </div>
@endsection
