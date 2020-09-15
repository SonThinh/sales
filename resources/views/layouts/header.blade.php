<header>
    <div class="container-fluid">
        <div class="d-flex justify-content-between p-3">
            <a href="{{route('home',app()->getLocale())}}">
                <h1 class="logo">
                    eCommerce
                </h1>
            </a>

            <div class="my-auto">
                @include('menu')
            </div>
        </div>
    </div>
</header>
