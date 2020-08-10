<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>کافه فسکو</title>
    <link rel="stylesheet" href="/css/bootstrap-rtl.min.css">
    <link rel="stylesheet" href="/css/admin.css">
    <script src="https://cdn.rtlcss.com/bootstrap/v4.2.1/js/bootstrap.min.js"
            integrity="sha384-a9xOd0rz8w0J8zqj1qJic7GPFfyMfoiuDjC9rqXlVOcGO/dmRqzMn34gZYDTel8k"
            crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/css/style.css">
    <link href="/css/all.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="/js/all.js"></script>
</head>
<body>
@include("admin.partials.nav")
<div class="container">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
            @yield("content")
        </div>
    </div>
</div>
</body>
</html>
