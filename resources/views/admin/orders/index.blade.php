@extends("layouts.admin")
@section("content")
    <div class="card">
        <div class="card-header">
            {{ isset($panel_title) ? $panel_title : "" }}
        </div>
        <div class="card-body">
            @include("admin.partials.errors")
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>شناسه</th>
                    <th>کاربر</th>
                    <th>غذاها</th>
                    <th>وضعیت</th>
                    <th>تاریخ سفارش</th>
                    <th>عملیات</th>
                </tr>
                </thead>
                <tbody>
                @if($orders && count($orders))
                    @foreach($orders as $order)
                        <tr>
                            <td>{{ $order->id }}</td>
                            <td>{{ $order->user->name }}</td>
                            <td>{{ $order->food_id }}</td>
                            <td>{{ $order->status }}</td>
                            <td>{{ $order->created_at }}</td>
                            <td><i class="fas fa-pen"></i><i class="fas fa-trash"></i></td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="6">سفارشی برای نمایش وجود ندارد.</td>
                    </tr>
                @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection
