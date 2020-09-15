@extends('index')
@section('title','Register Form')
@section('style')
    <link rel="stylesheet" href="{{asset('css/all.min.css')}}">
@endsection
@section('main')
    <div class="container">
        <form action="{{route('users.create',app()->getLocale())}}" method="POST" class="mt-3" autocomplete="off"
              id="register-form">
            @csrf
            <div class="form-group">
                <input class="form-control" type="text" name="email" placeholder="{{trans('lang.email')}}">
            </div>
            <div class="form-group">
                <input class="form-control" type="text" name="name" placeholder="{{trans('lang.name')}}">
            </div>
            <div class="form-group">
                <input class="form-control" type="password" name="password" placeholder="{{trans('lang.pass')}}">
            </div>
            <div class="form-group">
                <input class="form-control" type="password" name="password_confirmation"
                       placeholder="{{trans('lang.confirm_pass')}}">
            </div>
            <input type="submit" value="{{trans('lang.register')}}" class="btn btn-block btn-primary">
        </form>
    </div>
@endsection
@section('script')
    <script src="{{asset('js/all.min.js')}}"></script>
@endsection
