<header class="border-bottom mb-3">
    <div class="container pt-3 pb-3 d-flex align-items-center justify-content-between ">

        <h1><a class="text-decoration-none text-white" href="{{route('home')}}">{{config('app.name')}}</a></h1>
        @auth
            <div class="">
                <h6>You logged in as {{ Auth::user()->email }} <a href="{{ route('auth.logout') }}">Logout</a></h6>
            </div>
        @else


            <div class="">
                <a href="{{route('login')}}" class="btn btn-primary">Login</a>
                <a href="{{route('register')}}" class="btn btn-warning">Sign Up</a>
            </div>
        @endauth
    </div>
</header>
