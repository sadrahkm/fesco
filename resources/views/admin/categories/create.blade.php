@extends("layouts.admin")
@section("content")
    <div class="card">
        <div class="card-header">
            {{ isset($panel_title) ? $panel_title : "" }}
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-6">
                    @include("admin.partials.errors")
                    <form action="" method="post">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="catName">نام دسته بندی</label>
                            <input type="text" name="catName" id="catName" class="form-control"
                                   value="{{ old("catName",'') }}">
                        </div>
                        <div class="form-group">
                            <input type="submit" value="افزودن دسته بندی جدید" class="btn btn-success">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
