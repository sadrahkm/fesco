<?php $orderTabClass = "activeTab"; ?>
@extends("layouts.panel")
@section("content")
    <div id="orders">
        <div class="head">
            لیست سفارشات
        </div>
        <div class="row panel_list_item_head">
            <div class="col-4">تاریخ سفارش</div>
            <div class="col-3">وضعیت سفارش</div>
            <div class="col-3">قیمت کل</div>
            <div class="col-2">لیست غذاها</div>
        </div>
        @foreach($orders as $order)
            <div class="row panel_list_item">
                <div class="col-4">{{ $order->created_at }}</div>
                <div class="col-3">{{ $order->status }}</div>
                <div class="col-3">{{ $order->price }}</div>
                <div class="col-2"><i class="fas fa-angle-down"></i></div>
                <div data-orderid="{{ $order->id }}" class="food_list_item">
                    <ul>
                    </ul>
                </div>
            </div>
        @endforeach
    </div>
@endsection
