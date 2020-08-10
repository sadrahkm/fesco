@extends('layouts.settings')
@section('settings')
<div id="contactOptions">
    @include('admin.partials.errors')
    <form action="{{ route('admin.settings.store') }}" method="post" class="form-group">
        {{ csrf_field() }}

        <table>
            <tr>
                <td>
                    <label for="contactUsDesc">توضیحات قسمت تماس با ما</label></td>
                <td><textarea name="contact_desc" id="contactUsDesc" class="form-control" cols="30" rows="2">{{ isset($options['contact_desc']) ? $options['contact_desc'] : '' }}</textarea></td>
            </tr>
            <tr>
                <td>
                    <label for="contactUsDesc">آدرس نقشه گوگل</label></td>
                <td><textarea class="form-control" type="text" name="contact_google_address" id="googleMapAPI">{{ isset($options['contact_google_address']) ? $options['contact_google_address'] : '' }}</textarea></td>
            </tr>
        </table>
        <input class="btn btn-success" type="submit" value="ثبت تغییرات">
    </form>
</div>
@endsection
