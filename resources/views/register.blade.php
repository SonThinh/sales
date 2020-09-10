@extends('index')
@section('title','Register Form')
@section('style')
    <link rel="stylesheet" href="{{asset('css/all.min.css')}}">
@endsection
@section('main')
    <div class="container">
        <form action="{{route('users.create')}}" method="POST" class="mt-3" autocomplete="off" id="register-form">
            @csrf
            <div class="form-group">
                <input class="form-control" type="text" name="email" placeholder="Email">
            </div>
            <div class="form-group">
                <input class="form-control" type="text" name="name" placeholder="Name">
            </div>
            <div class="form-group">
                <input class="form-control" type="password" name="password" placeholder="Mật khẩu">
            </div>
            <div class="form-group">
                <input class="form-control" type="password" name="password_confirmation" placeholder="Nhập Lại Mật khẩu">
            </div>
            <input type="submit" value="Đăng ký" class="btn btn-block btn-primary">
        </form>
    </div>
@endsection
@section('script')
    <script src="{{asset('js/all.min.js')}}"></script>
@endsection
