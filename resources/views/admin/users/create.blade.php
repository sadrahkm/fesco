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
                            <label for="username">نام و نام خانوادگی</label>
                            <input type="text" name="username" id="username" class="form-control"
                                   value="{{ old("username",'') }}">
                        </div>
                        <div class="form-group">
                            <label for="email">ایمیل</label>
                            <input type="email" name="email" id="email" class="form-control"
                                   value="{{ old("email",'') }}">
                        </div>
                        <div class="form-group">
                            <label for="password">رمز عبور</label>
                            <input type="password" name="password" id="password" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="password2">تکرار رمز عبور</label>
                            <input type="password" name="password2" id="password2" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="phone">تلفن</label>
                            <input type="tel" name="phone" id="phone" class="form-control"
                                   value="{{ old("phone",'') }}">
                        </div>
                        <div class="form-group">
                            <label for="address">آدرس</label>
                            <textarea name="address" id="address" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <input type="submit" value="ایجاد کاربر" class="btn btn-success">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
