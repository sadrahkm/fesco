<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>کافه فسکو</title>
    <link rel="stylesheet" href="/css/bootstrap-rtl.min.css">
    <link rel="stylesheet" href="/css/admin.css">
    <link href="/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/style.css">
    <script src="https://cdn.rtlcss.com/bootstrap/v4.2.1/js/bootstrap.min.js"
            integrity="sha384-a9xOd0rz8w0J8zqj1qJic7GPFfyMfoiuDjC9rqXlVOcGO/dmRqzMn34gZYDTel8k"
            crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="/js/all.js"></script>
</head>
<body style="background-color: #f5f5f5">
<div class="cont"></div>
<section class="panel">
    <div class="main">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                    <div class="sidebarPanel">
                        <ul>
                            <li><a href="{{ route("homepage") }}"><i class="fas fa-crow"></i>صفحه اصلی</a></li>
                            <li id="editTab" class="<?php echo isset($infoTabClass) ? $infoTabClass : '' ?>"><a href="{{ route("frontend.panel.info") }}"><i
                                        class="fas fa-address-card"></i>ویرایش اطلاعات</a></li>
                            <li id="orderTab" class="<?php echo isset($orderTabClass) ? $orderTabClass : '' ?>"><a href="{{ route("frontend.panel.orders") }}"><i
                                        class="fas fa-angle-up"></i>سفارشات</a></li>
                            <li id="reserveTab" class="<?php echo isset($resTabClass) ? $resTabClass : '' ?>"><a href="{{ route("frontend.panel.reserves") }}"><i
                                        class="fas fa-angle-up"></i>رزرو ها</a></li>
                            <li id="logout"><a
                                    href="{{ route("logout") }}"><i
                                        class="fas fa-angle-up"></i>خروج</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
                    <div class="panelContent">
                        @include("admin.partials.errors")
                        @yield("content")
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</body>
</html>
