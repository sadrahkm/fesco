@extends('layouts.settings')
@section('settings')
    <div id="headerOptions">
        @include('admin.partials.errors')
        <form action="{{ route('admin.settings.store') }}" method="post" class="form-group"
              enctype="multipart/form-data">
            {{ csrf_field() }}
            <table>
                <tr>
                    <td>
                        <label for="headerBackgroundImg">تصویر پس زمینه</label></td>
                    <td><input name="header_back_img" id="headerBackgroundImg" type="file" class="form-control-file">
                    </td>

                </tr>
                <tr>
                    <td>
                        <label for="logo">تصویر لوگو</label></td>
                    <td><input name="header_logo_img" id="logo" type="file" class="form-control-file"></td>
                </tr>
                </tr>
                <tr>
                    <td>
                        <label for="logo_scroll">تصویر لوگو هنگام اسکرول</label>
                    </td>
                    <td>
                        <input name="header_logo_scroll_img" id="logoScroll" type="file" class="form-control-file">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="headerText">متن عکس هدر</label>
                    </td>
                    <td>
                        <textarea class="form-control" name="header_text" id="headerText" cols="30"
                                  rows="10">{{ isset($options['header_text']) ? $options['header_text'] : '' }}</textarea>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="contactHeaderDesc">توضیحات قسمت تماس با ما</label>
                    </td>
                    <td><textarea name="header_contact_desc" id="contactHeaderDesc" cols="30" rows="1"
                                  class="form-control">{{ isset($options['header_contact_desc']) ? $options['header_contact_desc'] : '' }}</textarea>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="address">آدرس</label>
                    </td>
                    <td><textarea name="header_address" id="address" cols="30" rows="1"
                                  class="form-control">{{ isset($options['header_address']) ? $options['header_address'] : '' }}</textarea>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="mapUrl">لینک نقشه</label>
                    </td>
                    <td>
                        <input class="form-control" name="header_map_url" id="mapUrl" type="text"
                               value="{{ isset($options['header_map_url']) ? $options['header_map_url'] : '' }}">
                    </td>
                </tr>
            </table>
            <input class="btn btn-success" type="submit" value="ثبت تغییرات">
        </form>
    </div>
@endsection
