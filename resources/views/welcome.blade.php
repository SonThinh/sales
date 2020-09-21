@extends('index')
@section('title','Welcome')
<meta name="list-user" content="{{route('users.index',app()->getLocale())}}">
<meta name="locale" content="{{app()->getLocale()}}">
<meta name="id" content="{{auth()->id()}}">
@role('admin')
<meta name="role" content="admin">
@endrole
@section('style')
    <link rel="stylesheet" href="{{asset('css/all.min.css')}}">
@endsection
@section('main')
    <div class="container">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">{{trans('lang.name')}}</th>
                <th scope="col">{{trans('lang.email')}}</th>
                @role('admin')
                <th scope="col"><a href="{{route('users.create',app()->getLocale())}}" class="btn btn-block btn-primary"><i
                            class="fal fa-plus"></i></a>
                </th>
                @endrole
            </tr>
            </thead>
            <tbody id="user-list"></tbody>
        </table>
    </div>
@endsection
@section('script')
    <script src="{{asset('js/all.min.js')}}"></script>
@endsection
