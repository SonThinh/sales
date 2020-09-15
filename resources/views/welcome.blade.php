@extends('index')
@section('title','Welcome')
<meta name="list-user" content="{{route('users.show',app()->getLocale())}}">
<meta name="locale" content="{{app()->getLocale()}}">
@section('style')
    <link rel="stylesheet" href="{{asset('css/all.min.css')}}">
@endsection
@section('main')
    <div class="container">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">{{trans('lang.name')}}</th>
                <th scope="col">{{trans('lang.email')}}</th>
                <th scope="col"><a href="{{route('view.create',app()->getLocale())}}" class="btn btn-block btn-primary"><i
                            class="fal fa-plus"></i></a>
                </th>
            </tr>
            </thead>
            <tbody id="user-list"></tbody>
        </table>
    </div>
@endsection
@section('script')
    <script src="{{asset('js/all.min.js')}}"></script>
@endsection
