@extends('index')
@section('title','Edit User Form')
@section('style')
    <link rel="stylesheet" href="{{asset('css/all.min.css')}}">
@endsection
@section('main')
    <div class="container">
        <form action="{{route('users.update',$user->id)}}" method="POST"
              class="mt-3"
              autocomplete="off" id="update-user">
            @method('PUT')
            @csrf
            <div class="form-group">
                <input class="form-control" type="text" name="email" value="{{$user->email}}">
            </div>
            <div class="form-group">
                <input class="form-control" type="text" name="name" value="{{$user->name}}">
            </div>
            <input type="submit" value="{{trans('lang.register')}}" class="btn btn-block btn-primary">
        </form>
    </div>
@endsection
@section('script')
    <script src="{{asset('js/all.min.js')}}"></script>
@endsection
