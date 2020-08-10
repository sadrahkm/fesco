@extends('layouts.settings')
@section('settings')
    <div id="menuOptions">
        @include('admin.partials.errors')
        <form action="{{ route('admin.settings.store') }}" method="post" class="form-group">
            {{ csrf_field() }}
            <table>
                <tr>
                    <td>
                        <label for="menuDesc">توضیحات قسمت منو</label></td>
                    <td><textarea name="menu_desc" id="menuDesc" class="form-control" cols="30" rows="2">{{ isset($options['menu_desc']) ? $options['menu_desc'] : '' }}</textarea></td>
                </tr>
                <tr>
                    <td>
                        <label for="menuCatNumbers">تعداد دسته بندی ها در صفحه اصلی</label>
                    </td>
                    <td>
                        <input class="form-control" type="number" name="menu_cat_numbers" id="menuCatNumbers" value="{{ isset($options['menu_cat_numbers']) ? $options['menu_cat_numbers'] : '' }}">
                    </td>
                </tr>
            </table>
            <input class="btn btn-success" type="submit" value="ثبت تغییرات">
        </form>
    </div>
@endsection
