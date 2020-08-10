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
                    <th>نام غذا</th>
                    <th>تعداد سفارشات</th>
                    <th>قیمت</th>
                    <th>مخلفات</th>
                </tr>
                </thead>
                <tbody>
                @if($foods && count($foods))
                    @foreach($foods as $food)
                        <tr>
                            <td>{{ $food->id }}</td>
                            <td>{{ $food->name }}</td>
                            <td>{{ $food->order_count }}</td>
                            <td>{{ $food->price }}</td>
                            <td>{{ $food->compounds }}</td>
                            <td><i class="fas fa-pen"></i><i class="fas fa-trash"></i></td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="5">غذایی برای نمایش وجود ندارد.</td>
                    </tr>
                @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection
