<nav class="navbar navbar-inverse">
    <div class="container">
        <div class="navbar-header">

            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed"
                    data-toggle="collapse" data-target="#app-navbar-collapse">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'Laravel') }}
            </a>
        </div>
        <ul class="nav navbar-nav">
            <li><a href="/">Home</a></li>
            <li><a href="{{url("/about")}}">About</a></li>
            <li><a href="{{url("/services")}}">Services</a></li>
            <li><a href="{{url("/posts")}}">Blog</a></li>
        </ul>
    </div>
</nav>