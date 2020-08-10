<?php $infoTabClass = "activeTab"; ?>
@extends("layouts.panel")
@section("content")
    <div id="editInfo">
        <div class="head">
            ویرایش اطلاعات
        </div>
        <form action="{{ route("frontend.users.edit",$user->id) }}" method="post">
            {{ csrf_field() }}
            <table>
                <tr>
                    <td>نام و نام خانوادگی</td>
                    <td><input class="form_input" name="username" type="text"
                               value="{{ $user->name }}"></td>
                </tr>
                <tr>
                    <td>ایمیل</td>
                    <td><input class="form_input" name="email" type="email"
                               value="{{ $user->email }}"></td>
                </tr>
                <tr>
                    <td>رمز عبور</td>
                    <td><input class="form_input" name="password" type="password"></td>
                </tr>
                <tr>
                    <td>تکرار رمز عبور</td>
                    <td><input class="form_input" name="password2" type="password"></td>
                </tr>
                <tr>
                    <td>تلفن همراه</td>
                    <td><input class="form_input" name="phone" type="tel"
                               value="{{ $user->phone }}"></td>
                </tr>
                <tr>
                    <td>آدرس</td>
                    <td><textarea name="address" class="form_input"
                                  style="resize: none; height: 150px; padding-top: 7px; font-size: 13px"
                                  cols="30" rows="10">{{ $user->address }}</textarea></td>
                </tr>
            </table>
            <input type="submit" class="btn btnCream" style="color: #FFFFFF" value="ثبت تغییرات">
        </form>
    </div>
@endsection
