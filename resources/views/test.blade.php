@if(Auth::check())
<li>
    <a class="nav-link"
       href="#">
        <span>{{auth()->user()->name}}</span>
    </a>
</li>
<li>
    <a class="nav-link" href="{{route('logout')}}"><span><i class="fal fa-sign-out-alt"></i> Đăng xuất</span></a>
</li>
@else
    <li>
        <a class="nav-link"
           href=""><span>Đăng nhập</span></a>
    </li>
    <li>
        <a class="nav-link"
           href=""><span>Đăng ký</span></a>
    </li>
@endif
