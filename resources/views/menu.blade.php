@if(Auth::check())
    <a href="#">
        <span>{{auth()->user()->name}}</span>
    </a>

    <a href="{{route('logout')}}"><span><i class="fal fa-sign-out-alt"></i> Đăng xuất</span></a>
@else
    <a href="{{route('view.login')}}"><span>Đăng nhập</span></a>
@endif
