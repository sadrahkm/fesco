@extends('layouts.admin')
@section('content')
    <div id="settingsContainer">
        <div id="settingsTabWrapper">
            <ul>
                <li><a href="{{ route('admin.settings.header') }}">هدر</a></li>
                <li><a href="{{ route('admin.settings.aboutUs') }}">درباره ما</a></li>
                <li><a href="{{ route('admin.settings.specials') }}">تخصص ها</a></li>
                <li><a href="{{ route('admin.settings.menu') }}">منو</a></li>
                <li><a href="{{ route('admin.settings.reserve') }}">رزرو</a></li>
                <li><a href="{{ route('admin.settings.contact') }}">تماس</a></li>
                <li><a href="#">فوتر</a></li>
            </ul>
        </div>
        <div id="settingsContentWrapper">
            <div class="settingsContentContainer">
                @yield('settings')
            </div>
        </div>
    </div>
@endsection
