@extends('index')
@section('title','Welcome')
<meta name="list-user" content="{{route('users.show')}}">
@section('style')
    <link rel="stylesheet" href="{{asset('css/all.min.css')}}">
@endsection
@section('main')
    <div class="container">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col"><a href="{{route('view.create')}}" class="btn btn-block btn-primary">Add</a></th>
            </tr>
            </thead>
            <tbody id="user-list"></tbody>
        </table>
    </div>
@endsection
@section('script')
    <script src="{{asset('js/all.min.js')}}"></script>
@endsection
