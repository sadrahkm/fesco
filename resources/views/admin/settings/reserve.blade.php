@extends('layouts.settings')
@section('settings')
    <div id="reserveOptions">
        @include('admin.partials.errors')
        <form action="{{ route('admin.settings.store') }}" method="post" class="form-group"
              enctype="multipart/form-data">
            {{ csrf_field() }}
            <table>
                <tr>
                    <td>
                        <label for="ReserveBackImg">تصویر پس زمینه</label>
                    </td>
                    <td>
                        <input type="file" name="reserve_back_img" id="ReserveBackImg" class="form-control-file">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="reserveDesc">توضیحات قسمت رزرو ها</label></td>
                    <td><textarea name="reserve_desc" id="reserveDesc" class="form-control" cols="30"
                                  rows="2">{{ isset($options['reserve_desc']) ? $options['reserve_desc'] : '' }}</textarea>
                    </td>
                </tr>
            </table>
            <input class="btn btn-success" type="submit" value="ثبت تغییرات">
        </form>
    </div>
@endsection
