@extends('index')
@section('title','Delete User Form')
@section('style')
    <link rel="stylesheet" href="{{asset('css/all.min.css')}}">
@endsection
@section('main')
    <div class="container">
        <form action="{{route('users.delete',['locale'=>app()->getLocale(),'id'=>$user->id])}}" method="POST" class="mt-3" autocomplete="off" id="delete-user">
            @method('DELETE')
            @csrf
            <div class="form-group">
                <input class="form-control" type="text" name="email" disabled value="{{$user->email}}">
            </div>
            <div class="form-group">
                <input class="form-control" type="text" name="name" disabled value="{{$user->name}}">
            </div>
            <input type="submit" value="{{trans('lang.del')}}" class="btn btn-block btn-primary">
        </form>
    </div>
@endsection
@section('script')
    <script src="{{asset('js/all.min.js')}}"></script>
@endsection
