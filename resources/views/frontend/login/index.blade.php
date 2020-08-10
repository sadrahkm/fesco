<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>کافه فسکو</title>
    <link rel="stylesheet" href="/css/style.css">
    <link href="/css/all.css" rel="stylesheet">
    <script src="/js/jquery-3.4.1.min.js"></script>
    <script src="/js/all.js"></script>
    <style>
        .alert {
            margin: 14px 0;
            background: #be9d7a;
            padding: 20px;
            color: #fff;
            border-radius: 6px;
        }
    </style>
</head>
<body style="text-align:right;">
<header class="bgImage">
    <div class="mask"></div>
    <div class="content">
        <div class="main">
            <div class="clear"></div>
            <div class="auth-form">
                <div id="loginTab" class="auth-tab login-tab">ورود</div>
                <div id="registerTab" class="auth-tab register-tab">عضویت</div>
                @include("admin.partials.errors")
                <form id="login" action="{{ route("frontend.login.doLogin") }}" method="post">
                    {{ csrf_field() }}
                    <input class="form_input" name="email" type="email" placeholder="ایمیل">
                    <input class="form_input" name="password" type="password" placeholder="رمز عبور ">
                    <label for="rememberme"> من را به خاطر بسپار
                        <input id="rememberme" type="checkbox">
                    </label>
                    <input type="hidden" name="type" value="login">
                    <input class="form_input" name="login" type="submit" value="ورود">
                </form>
                <form id="register" action="{{ route("frontend.login.doRegister") }}" method="post">
                    {{ csrf_field() }}
                    <input class="form_input" name="username" type="text" placeholder="نام و نام خانواگی">
                    <input class="form_input" name="email" type="email" placeholder="ایمیل">
                    <input class="form_input" name="password" type="password" placeholder="رمز عبور">
                    <input class="form_input" name="password2" type="password" placeholder="تکرار رمز عبور">
                    <input class="form_input" name="phone" type="tel" placeholder="تلفن همراه">
                    <textarea name="address" name="address" id="address" cols="30" rows="10" placeholder="آدرس شما"></textarea>
                    <input class="form_input" type="submit" name="register" value="ثبت نام">
                    <input type="hidden" name="type" value="register">
                </form>
            </div>
        </div>
    </div>
</header>
<div class="clear"></div>

</body>
</html>
