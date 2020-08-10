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
                    <th>نام</th>
                    <th>ایمیل</th>
                    <th>نقش</th>
                    <th>تلفن</th>
                    <th>آدرس</th>
                    <th>تعداد سفارشات</th>
                    <th>تاریخ عضویت</th>
                    <th>عملیات</th>
                </tr>
                </thead>
                <tbody>
                @if($users && count($users))
                    @foreach($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->role }}</td>
                            <td>{{ $user->phone }}</td>
                            <td>{{ $user->address }}</td>
                            <td>{{ $user->order_count }}</td>
                            <td>{{ $user->created_at }}</td>
                            <td><i class="fas fa-pen"></i><i class="fas fa-trash"></i></td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="8">کاربری برای نمایش وجود ندارد.</td>
                    </tr>
                @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection
