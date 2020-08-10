<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>کافه فسکو</title>
    <link rel="stylesheet" href="/css/style.css">
    <link href="/css/all.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="/js/all.js"></script>
    <style>
        header.bgImage {
            background-image: url({{ isset($options['header_back_img']) ? \Illuminate\Support\Facades\URL::to('/'). '/img/admin/' .$options['header_back_img'] : '' }});
        }
        #specialities {
            background-image: url({{ isset($options['special_back_img']) ? \Illuminate\Support\Facades\URL::to('/'). '/img/admin/' .$options['special_back_img'] : '' }});
        }
        #book {
            background-image: url({{ isset($options['reserve_back_img']) ? \Illuminate\Support\Facades\URL::to('/'). '/img/admin/' .$options['reserve_back_img'] : '' }});

        }
    </style>
</head>
<body>
<header class="bgImage">
    <div class="mask"></div>
    <div class="content">
        <div class="main">
            <nav id="menuNavi">
                <div class="main" id="miMenuId">
                    <div class="moblleMenu fas fa-bars" id="MobileMenuIcon" onclick="fadeInLeft()"></div>
                    <div class="logo">
                        <img id="logoImg" src="{{ isset($options['header_logo_img'])?\Illuminate\Support\Facades\URL::to('/').'/img/admin/'.$options['header_logo_img'] : '' }}" alt="کافه فسکو" width="75" height="37">
                        <img id="logoFixImg" src="{{ isset($options['header_logo_scroll_img'])?\Illuminate\Support\Facades\URL::to('/').'/img/admin/'.$options['header_logo_scroll_img'] : '' }}" alt="کافه فسکو" width="75" height="37">
                    </div>
                    @if(\Illuminate\Support\Facades\Auth::check())
                        <div class="logout"><a href="{{ route("frontend.panel.info") }}">حساب کاربری</a></div>
                        <a href="{{ route('frontend.cart.index') }}">
                            <div id="cart">
                                <span><i class="fas fa-cart-plus"></i> </span>
                                <span>سبد خرید</span>
                                <span id="cartNumber">{{ session()->has('cart') ? sizeof(session()->get('cart')) : 0 }}</span>
                            </div>
                        </a>
                    @else
                        <a href="{{ route("frontend.login.show") }}">
                            <div id="login_menu">
                                <span>ورود</span>/
                                <span>عضویت</span>
                            </div>
                        </a>
                    @endif
                    <ul id="menuUl">
                        <div class="fas fa-times" id="exitBtn" onclick="exitMenu()"></div>
                        <li><a href="#top">خانه</a></li>
                        <li><a href="#about">درباره ما</a></li>
                        <li><a href="#menu">منو</a></li>
                        <li><a href="#book">رزرو</a></li>
                        <li><a href="#contact">تماس با ما</a></li>
                    </ul>
                    <div class="clear"></div>
                </div>
            </nav>
            <div class="clear"></div>
            <div class="topImgContent">
                <h2>شعار ما غذای خوشمزه </h2>
                <h3>غذاهای ایتالیایی</h3>
                <p>این یک متن تصادفی می باشد و هیچ اعتبار دیگری نخواهد داشت و فقط برای پر کردن فضا است.</p>
            </div>
        </div>
    </div>
</header>
<div class="clear"></div>
@yield("content")
</body>
</html>
