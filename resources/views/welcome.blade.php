<meta name="list-user" content="{{route('users.index')}}">
<meta name="list-post" content="{{route('posts.index')}}">
<meta name="list-cate" content="{{route('categories.index')}}">
<meta name="id" content="{{auth()->id()}}">
@role('admin')
<meta name="role" content="admin">
@endrole
@extends('index')
@section('title','Welcome')
@section('style')
    <link rel="stylesheet" href="{{asset('css/all.min.css')}}">
@endsection
@section('main')
    <main>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <table class="table table-sm table-cate">
                        <thead>
                        <tr>
                            <th scope="col">{{trans('lang.name')}}</th>
                            @if(Auth::check())
                                <th scope="col"><a href="#"
                                                   class="btn btn-block btn-primary"><i
                                            class="fal fa-plus"></i></a>
                                </th>
                            @endif
                        </tr>
                        </thead>
                        <tbody id="cate-list"></tbody>
                    </table>
                    @role('admin')
                    <table class="table table-sm table-user">
                        <thead>
                        <tr>
                            <th scope="col">{{trans('lang.name')}}</th>
                            <th scope="col">{{trans('lang.email')}}</th>
                            <th scope="col"><a href="{{route('users.create',app()->getLocale())}}"
                                               class="btn btn-block btn-primary"><i
                                        class="fal fa-plus"></i></a>
                            </th>
                        </tr>
                        </thead>
                        <tbody id="user-list"></tbody>
                    </table>
                    @endrole
                </div>

                <div class="col-md-8">
                    <div class="ml-3" id="list-post"></div>
                    {{--                    <div class="my-2 ml-3 text-center" class="ajax-loading">--}}
                    {{--                        <img style="width: 15%" src="{{ asset('loader/loading.gif') }}" alt="">--}}
                    {{--                    </div>--}}
                </div>
            </div>
        </div>
    </main>
@endsection
@section('script')
    <script src="{{asset('js/all.min.js')}}"></script>
@endsection
