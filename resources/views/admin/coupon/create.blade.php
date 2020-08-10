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
                            <label for="name">کد کوپن</label>
                            <input type="text" name="code" id="code" class="form-control" value="{{ old("code",'') }}">
                        </div>
                        <div class="form-group">
                            <label for="price">درصد تخفیف</label>
                            <input type="number" name="percent" id="percent" class="form-control"
                                   value="{{ old("percent","") }}">
                        </div>
                        <div class="form-group">
                            <input type="submit" value="افزودن کوپن" class="btn btn-success">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
