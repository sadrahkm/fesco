@extends('layouts.report')
@section('content')
    <div id="checkCart" class="pagesBox">
        <div class="head">سبد خرید</div>
        <div class="row head_cart">
            <div class="col-3">غذا</div>
            <div class="col-3">قیمت</div>
            <div class="col-3">تعداد</div>
            <div class="col-3">عملیات</div>
        </div>
        @if($foodItems && count($foodItems) > 0)
            @foreach($foodItems as $id => $foodItem)
                <div data-foodid="{{ $foodItem['item']->id }}" class="row value_cart">
                    <div class="col-3">{{ $foodItem['item']->name }}</div>
                    <div class="col-3">{{ $foodItem['item']->price }}</div>
                    <div class="col-3"><input type="number" min="1" value="{{ $foodItem['iterate'] }}"></div>
                    <a href="{{ route('frontend.cart.delete',$foodItem['item']->id) }}">
                        <div class="col-3"><i class="fas fa-trash-alt"></i></div>
                    </a>
                </div>
            @endforeach
        @else
            <p>کالایی در سبد خرید موجود نیست.</p>
        @endif
        <form id="coupon">
            <input class="form-control" name="code" type="text" placeholder="کد تخفیف">
            <input type="submit" value="اعمال">
        </form>
        <div class="priceBox">
            <div id="total_price" class="price">
                <span>قیمت بدون تخفیف : </span>
                <span>{{ $totalPrice }} هزار تومان</span>
            </div>
            <div id="discount" class="price off">
                <span>تخفیف : </span>
                <span>{{ $discount }} هزار تومان</span>
            </div>
            <div id="finalPrice" class="price">
                <span>قیمت نهایی</span>
                <span>{{ $finalPrice }} هزار تومان </span>
            </div>
            <div class="clear"></div>
        </div>
        <form action="{{ route('frontend.cart.checkout') }}" method="get" style="text-align:center;">
            {{ csrf_field() }}
            <input class="btn btnCream" style="display: inline-block;margin: 15px 0 15px 15px;" type="submit"
                   value="تایید سفارش">
        </form>
        <form action="{{ route('frontend.cart.clear') }}" method="post">
            {{ csrf_field() }}
            <input type="submit" class="btn cancelBtn" value="انصراف">
        </form>
    </div>
@endsection
