@foreach(Config('contrants.LANGUAGE') as $key => $value)
    <a href="{{route('home',$key)}}"
       @if(app()->getLocale() === $key) class="active" @endif>{{$value}}</a>
@endforeach

@if(Auth::check())
    <a href="#">
        <span>{{auth()->user()->name}}</span>
    </a>
    <a href="{{route('logout',app()->getLocale())}}"><span><i class="fal fa-sign-out-alt"></i> {{trans('lang.logout')}}</span></a>
@else
    <a href="{{route('view.login',app()->getLocale())}}"><span>{{trans('lang.login')}}</span></a>
@endif


