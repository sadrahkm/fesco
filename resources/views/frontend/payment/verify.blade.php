@extends('layouts.report')
@section('content')
    <div id="verify_order" class="pagesBox">
        @include('admin.partials.errors')
        <ul>
            <li>
                <span>نام تحویل گیرنده</span>
                <span> {{ $user->name }} </span>
            </li>
            <li>
                <span>شماره پیگیری</span>
                <span> 2328093</span>
            </li>
        </ul>
        <a href="{{ route('homepage') }}">
            <button class="btn btnCream" style=" margin: 0 auto;text-align: center;width: auto;">انتقال به صفحه اصلی
            </button>
        </a>
    </div>
@endsection
