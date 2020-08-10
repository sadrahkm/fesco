@extends('layouts.home')
@section('content')
    <div class="clear"></div>
    <section class="menuSingle">
        <div class="sMenuHead">
            <h2>منوی رستوران</h2>
            <p>قسمتی از منوی رستوران در قسمت زیر قابل مشاهده است. برای دیدن کامل منو روی دکمه پایین کلیک کنید</p>
        </div>
    </section>
    <section id="menu">
        <div class="main">
            <div class="menuContainer">
                @foreach($categories as $category)
                    <div class="collectionBox">
                        <span class="collSubject">{{ $category->name }}</span>
                        <ul>
                            @foreach($category->foods as $food)
                                <li data-foodid="{{ $food->id }}"
                                    style="background-image: url('{{ \Illuminate\Support\Facades\URL::to('/')}}/img/{{ $food->file_name }}')">
                                    <div class="foodInfo">
                                        <h4>{{ $food->name }}</h4>
                                        <p>{{ $food->compounds }}</p>
                                    </div>
                                    <span>{{ $food->price }} هزار تومان</span>
                                </li>
                            @endforeach
                        </ul>
                        <div class="clear"></div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
