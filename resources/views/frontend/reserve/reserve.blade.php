@extends('layouts.report')
@section('content')
    <div id="verify_reserve" class="pagesBox">
        <div class="head">اطلاعات رزرو</div>
        @include("admin.partials.errors")
        <ul>
            <li>
                <span>نام رزرو کننده :</span>
                <span>{{ $data['user']->name }}</span>
            </li>
            <li>
                <span>تاریخ رزرو :</span>
                <span>{{ $data['date'] }}</span>
            </li>
            <li>
                <span>ساعت رزرو :</span>
                <span>{{ $data['time'] }}</span>
            </li>
            <li>
                <span>تعداد نفرات :</span>
                <span>{{ $data['people_count'] }}</span>
            </li>
        </ul>
        <form action="{{ route("frontend.doReserve") }}" method="post" style="text-align: center;">
            {{ csrf_field() }}
            <input type="hidden" name="date" value="{{ $data['date'] }}">
            <input type="hidden" name="time" value="{{ $data['time'] }}">
            <input type="hidden" name="people_count" value="{{ $data['people_count'] }}">
            <input class="btn btnCream" style="display: inline-block;margin: 0" type="submit" value="تایید رزرو">
            <button class="btn cancelBtn">خالی کردن</button>
        </form>
    </div>

@endsection
