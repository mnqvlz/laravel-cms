<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{url('/articles')}}">Blog</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                {{--<li><a href="{{url('/articles')}}">Articles</a></li>--}}
                <li><a href="{{url('/articles/create')}}">Create</a></li>
                <li><a href="{{url('/article/manage')}}">Manage Articles</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        Categories <span class="caret"></span>
                    </a>

                    <ul class="dropdown-menu" role="menu">

                        <li><a href="{{ url('/tags' )}}"><i class="fa fa-btn fa-sign-out"></i>Create Categories</a></li>

                    </ul>

                </li>
            </ul>

            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                @if (Auth::guest())
                    <li><a href="{{ url('auth/login') }}">Login</a></li>
                    <li><a href="{{ url('auth/register') }}">Register</a></li>
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{{ url('auth/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                        </ul>
                    </li>
            @endif
        </div><!--/.nav-collapse -->
    </div>
</nav>
<br><br><br><br>