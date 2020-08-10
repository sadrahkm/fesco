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
                    <th>نام دسته بندی</th>
                    <th>عملیات</th>
                </tr>
                </thead>
                <tbody>
                @if($categories && count($categories))
                    @foreach($categories as $category)
                        <tr>
                            <td>{{ $category->id }}</td>
                            <td>{{ $category->name }}</td>
                            <td><i class="fas fa-pen"></i><i class="fas fa-trash"></i></td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="8">دسته بندی برای نمایش وجود ندارد.</td>
                    </tr>
                @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection
