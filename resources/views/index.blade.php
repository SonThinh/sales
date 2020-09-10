<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>@yield('title') - eCommerce</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    @yield('style')
</head>
<body>
@include('layouts.header')
<!--main-->
@yield('main')
<!--main-->
@yield('script')
</body>
</html>
