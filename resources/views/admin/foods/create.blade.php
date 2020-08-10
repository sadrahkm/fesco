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
                    <form action="" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="name">نام غذا</label>
                            <input type="text" name="name" id="name" class="form-control" value="{{ old("name",'') }}">
                        </div>
                        <div class="form-group">
                            <label for="price">قیمت</label>
                            <input type="text" name="price" id="price" class="form-control"
                                   value="{{ old("price","") }}">
                        </div>
                        <div class="form-group">
                            <label for="compounds">مخلفات</label>
                            <textarea name="compounds" id="compounds" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <select class="form-control" name="category" id="category">
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-control-file">
                            <label for="picture">تصویر غذا</label>
                            <input type="file" id="picture" name="picture">
                        </div>
                        <div class="form-control">
                            <label for="special">افوزدن به قسمت تخصصی ها</label>
                            <input type="checkbox" name="isSpecial" id="special">
                        </div>
                        <div class="form-group">
                            <input type="submit" value="افزودن غذا" class="btn btn-success">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
