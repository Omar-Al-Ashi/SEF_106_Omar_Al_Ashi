<nav class="navbar navbar-expand-md navbar-light navbar-laravel" style="background-color: #00C5CD ">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            <img src="https://s3-eu-west-1.amazonaws.com/welovebeauty/brands/o-b-/logo.png?1472826568" alt="Omar's Blog" height="50" width="80">
            {{ config('app.name', 'Laravel') }}
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse"
                data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">

            </ul>


            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto navbar-right">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link"
                           href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"
                           href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>

                    <li class="nav-item"><a class="nav-link" href="{{url("/")}}">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{url("/about")}}">About</a></li>
                    {{--<li><a href="{{url("/services")}}">Services</a></li>--}}
                    <li class="nav-item"><a class="nav-link" href="{{url("/posts")}}">Blog</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{url("/home")}}">Dashboard</a></li>

                @else
                    <li class="nav-item dropdown">

                    <li class="nav-item"><a class="nav-link" href="{{url("/")}}">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{url("/about")}}">About</a></li>
                    {{--<li><a href="{{url("/services")}}">Services</a></li>--}}
                    <li class="nav-item"><a class="nav-link" href="{{url("/posts")}}">Blog</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{url("/home")}}">Dashboard</a></li>

                    <a id="navbarDropdown" class="nav-link dropdown-toggle"
                       href="#" role="button" data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right"
                         aria-labelledby="navbarDropdown">
                        <a class="dropdown-item"
                           href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>


                        <form id="logout-form"
                              action="{{ route('logout') }}" method="POST"
                              style="display: none;">
                            @csrf
                        </form>
                    </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>