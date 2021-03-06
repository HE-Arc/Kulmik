<!--https://laracasts.com/discuss/channels/general-discussion/add-fixed-menu-bar-to-all-the-views-->
<!--https://stackoverflow.com/questions/29837555/setting-bootstrap-navbar-active-class-in-laravel-5-->

<nav class="navbar navbar-default navbar-static-top">
    <div class="container">
        <div class="navbar-header">

            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Left Side Of Navbar -->
            <ul class="nav navbar-nav">
                <!--{{ Request::is('/') ? 'active' : '' }} make the button active so the user see where he is-->
                <!--{{ url('about') }} dynamic link with routes-->
                <li class="{{ Request::is('/') ? 'active' : '' }}"><a href="{{ url('/') }}">Home</a></li>
                @if (Auth::check())
                    <li class="{{ Request::is('containers') ? 'active' : '' }}"><a href="{{ url('containers') }}">Containers</a></li>
                    <li class="{{ Request::is('aliments') ? 'active' : '' }}"><a href="{{ url('aliments') }}">Aliments</a></li>
                    <li class="{{ Request::is('recipes') ? 'active' : '' }}"><a href="{{ url('recipes') }}">Recipes</a></li>
                @endif
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">About<span class="caret"></span></a>
                  <ul class="dropdown-menu" role="menu">
                    <li class="{{ Request::is('about') ? 'active' : '' }}"><a href="{{ url('about') }}">About us</a></li>
                    <li class="{{ Request::is('contact') ? 'active' : '' }}"><a href="{{ url('contact') }}">Contact</a></li>
                    <!-- More examples
                    <li class="divider"></li>
                    <li class="dropdown-header">Nav header</li>
                    <li><a href="#">Separated link</a></li>
                    -->
                  </ul>
                </li>
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                @guest
                    <li><a href="{{ route('login') }}">Login</a></li>
                    <li><a href="{{ route('register') }}">Register</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endguest
            </ul>
        </div>
    </div>
</nav>
