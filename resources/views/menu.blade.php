@foreach(Config('contrants.LANGUAGE') as $key => $value)
    <a @if(app()->getLocale() === $key)href="javascript:void(0)"
       class="active" @else href="{{route('home',$key)}}" @endif>
        <img src="{{asset('flag/'.$value['flag'].'/32.png')}}"
             alt="{{$value['nativeName']}}"></a>
@endforeach

@if(Auth::check())
    <a href="{{route('users.show',auth()->user()->id)}}">
        <span>{{auth()->user()->name}}</span>
    </a>
    <a href="{{route('logout',app()->getLocale())}}"><span><i class="fal fa-sign-out-alt"></i> {{trans('lang.logout')}}</span></a>
@else
    <a href="{{route('view.login',app()->getLocale())}}"><span>{{trans('lang.login')}}</span></a>
@endif


