@extends('index')
@section('title','Login Form')
@section('style')
    <link rel="stylesheet" href="{{asset('css/all.min.css')}}">
@endsection
@section('main')
    <div class="container">
        <form action="{{route('login')}}" class="mt-3" autocomplete="off" id="login-form">
            @csrf
            <div class="form-group">
                <input class="login-input form-control" type="text" name="email" placeholder="Email">
            </div>
            <div class="form-group">
                <input class="login-input form-control" type="password" name="password" placeholder="Mật khẩu">
            </div>
            <input type="submit" value="Đăng nhập" class="btn btn-block btn-primary">
        </form>
    </div>
@endsection
@section('script')
    <script src="{{asset('js/all.min.js')}}"></script>
@endsection
