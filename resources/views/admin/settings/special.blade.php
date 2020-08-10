@extends('layouts.settings')
@section('settings')
    <div id="specialOptions">
        @include('admin.partials.errors')
        <form action="{{ route('admin.settings.store') }}" method="post" class="form-group" enctype="multipart/form-data">
            {{ csrf_field() }}
            <table>
                <tr>
                    <td>
                        <label for="SpecialBackImg">تصویر پس زمینه</label>
                    </td>
                    <td>
                        <input class="form-control-file" type="file" name="special_back_img" id="SpecialBackImg">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="specialDesc">توضیحات قسمت تخصص ما</label></td>
                    <td><textarea name="special_desc" id="specialDesc" class="form-control" cols="30"
                                  rows="2">{{ isset($options['special_desc']) ? $options['special_desc'] : '' }}</textarea>
                    </td>

                </tr>
                <tr>
                    <td>
                        <label for="specialNumberPosts">تعداد مطالب برای نمایش</label>
                    </td>
                    <td>
                        <input class="form-control" type="number" name="special_post_numbers" id="specialNumberPosts"
                               value="{{ isset($options['special_post_numbers']) ? $options['special_post_numbers'] : '' }}">
                    </td>
                </tr>
            </table>
            <input class="btn btn-success" type="submit" value="ثبت تغییرات">
        </form>
    </div>
@endsection
