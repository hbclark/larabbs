
<nav class="navbar navbar-default navbar-static-top">
    <div class="container">
        <div class="navbar-header">

            <!-- Collapsed Hamburger -->
            <button tyep="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <!-- Branding Image -->
            <a class="navbar-brand" href="{{url('/')}}">
                Larabbs
            </a>
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- left side of navbar -->
            <ul class="nav navbar-nav">

            </ul>


            <!-- Right side of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                @guest
                    <li><a href="{{route('login')}}">Sign In</a></li>
                    <li><a href="{{route('register')}}">Sign Up</a></li>
                 @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="drop" role="button" aria-expanded="false">
                            <span class="user-avatar pull-left" style="margin-right:8px;margin-top:-5px">

                            </span>
                            <img src="{{Auth::user()->gravatar('40')}}">
                            {{Auth::user()->name}} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li>
                                <a href="{{route('users.edit',Auth::id())}}">
                                    Edit profile
                                </a>
                            </li>

                            <li>
                                <a href="{{route('logout')}}"
                                   onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                    Logout

                                </a>

                                <form id="logout-from" action="{{route('logout')}}" method="POST" style="display:none;">
                                    {{csrf_field()}}
                                </form>
                            </li>
                        </ul>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>

