@extends('layouts.settings')
@section('settings')
<div id="aboutUsOptions">
    @include('admin.partials.errors')
    <form action="{{ route('admin.settings.store') }}" method="post" class="form-group" enctype="multipart/form-data">
        {{ csrf_field() }}
        <table>
            <tr>
                <td>
                    <label for="aboutUsPicture">تصویر درباره ما</label></td>
                <td><input id="about_pic" name="about_pic" type="file" class="form-control-file"></td>

            </tr>
            <tr>
                <td>
                    <label for="aboutUsText">متن درباره ما</label>
                </td>
                <td>
                    <textarea class="form-control" name="about_text" id="aboutUsText" cols="30"
                                          rows="10">{{ isset($options['about_text']) ? $options['about_text'] : '' }}</textarea>
                </td>
            </tr>
        </table>
        <input class="btn btn-success" type="submit" value="ثبت تغییرات">
    </form>
</div>
@endsection
