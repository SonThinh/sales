@extends('index')
@section('title','Login Form')
@section('style')
    <link rel="stylesheet" href="{{asset('css/all.min.css')}}">
@endsection
@section('main')
    <div class="container">
        <form action="{{route('login',app()->getLocale())}}" class="mt-3" autocomplete="off" id="login-form">
            @csrf
            <div class="form-group">
                <input class="login-input form-control" type="text" name="email" placeholder="{{trans('lang.email')}}">
            </div>
            <div class="form-group">
                <input class="login-input form-control" type="password" name="password" placeholder="{{trans('lang.pass')}}">
            </div>
            <input type="submit" value="{{trans('lang.login')}}" class="btn btn-block btn-primary">
        </form>
    </div>
@endsection
@section('script')
    <script src="{{asset('js/all.min.js')}}"></script>
@endsection
