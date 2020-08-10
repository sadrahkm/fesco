<?php $resTabClass = "activeTab"; ?>
@extends("layouts.panel")
@section("content")
    <div id="reserves">
        <div class="head">
            لیست رزروها
        </div>
        <div class="row panel_list_item_head">
            <div class="col-4">تاریخ رزرو</div>
            <div class="col-4">زمان ایجاد</div>
            <div class="col-2">ساعت رزرو</div>
            <div class="col-2">تعداد نفرات</div>
        </div>
        @foreach($reserves as $reserve)
            <div class="row panel_list_item">
                <div class="col-4">{{ $reserve->reserved_at }}</div>
                <div class="col-4">{{ $reserve->created_at }}</div>
                <div class="col-2">{{ $reserve->time }}</div>
                <div class="col-2">{{ $reserve->people_count }}</div>
            </div>
        @endforeach
    </div>
@endsection
