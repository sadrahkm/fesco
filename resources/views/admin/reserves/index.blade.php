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
                    <th>شماره پیگیری</th>
                    <th>تعداد نفرات</th>
                    <th>زمان رزرو</th>
                    <th>زمان ثبت</th>
                    <th>عملیات</th>
                </tr>
                </thead>
                <tbody>
                @if($reserves && count($reserves))
                    @foreach($reserves as $reserve)
                        <tr>
                            <td>{{ $reserve->id }}</td>
                            <td>{{ $reserve->user_id }}</td>
                            <td>{{ $reserve->track_number }}</td>
                            <td>{{ $reserve->people_count }}</td>
                            <td>{{ $reserve->reserved_at }}</td>
                            <td>{{ $reserve->created_at }}</td>
                            <td><i class="fas fa-pen"></i><i class="fas fa-trash"></i></td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="8">رزروی برای نمایش وجود ندارد.</td>
                    </tr>
                @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection
