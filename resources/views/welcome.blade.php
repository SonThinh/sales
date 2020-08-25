<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>eCommerce</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link href="{{asset('../resources/assets/css/bootstrap-v4.5.2.min.css')}}" rel="stylesheet">
</head>
<body>
<header>
    <div class="container-fluid">
        <div class="d-flex justify-content-between p-3">
            <h1 class="logo">
                eCommerce
            </h1>
            <div class="my-auto">
                <a href="{{route('view.login')}}">Login</a>
                <a href="https://laracasts.com">Laracasts</a>
                <a href="https://laravel-news.com">News</a>
                <a href="https://blog.laravel.com">Blog</a>
                <a href="https://nova.laravel.com">Nova</a>
                <a href="https://forge.laravel.com">Forge</a>
                <a href="https://vapor.laravel.com">Vapor</a>
                <a href="https://github.com/laravel/laravel">GitHub</a>
            </div>
        </div>
    </div>
</header>

<script type="text/javascript" src="{{asset('../resources/assets/js/jquery-v3.5.1.min.js')}}"></script>
<script type="text/javascript" src="{{asset('../resources/assets/js/popper.min.js')}}"></script>
<script type="text/javascript" src="{{asset('../resources/assets/js/bootstrap-v4.5.2.min.js')}}"></script>
</body>
</html>
