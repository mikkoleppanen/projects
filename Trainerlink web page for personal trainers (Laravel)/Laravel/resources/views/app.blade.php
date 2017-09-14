@include('head')
<body>

<nav id="topbar" class="navbar">
    <div id="topbar-content" class="container-fluid">
        <div class="navbar-header">
            <button type="button" id="toggle-button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#topmenu">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="/"><img id="logo" src="{{ URL::asset('img/alink.svg') }}"></a>
        </div>
        <div class="collapse navbar-collapse" id="topmenu">
            <ul class="nav navbar-nav">
                <li class="active"><a class="menu-item" href="/trainers">{{ trans('app.trainers') }}</a></li>
                <!-- <li><a class="menu-item" href="/blogs">BLOGIT</a></li>
                <li><a class="menu-item" href="/forum" class="dead">KESKUSTELU</a></li>
                <li><a class="menu-item" href="/info" class="dead">INFO</a></li>
                -->
            </ul>
            <ul class="nav navbar-nav navbar-right">
                @if(Auth::user() == null)
                    <li><a class="menu-item" href="/auth/login">{{ trans('app.login') }}</a></li>
                    <li><a class="menu-item" href="/auth/register" class="dead">{{ trans('app.register') }}</a></li>
                @else
                    <li><a class="menu-item" href="/user/profile">{{Auth::user()->first_name}} {{Auth::user()->last_name}}</a></li>
                    <li><a class="menu-item" href="/auth/logout">{{ trans('app.logout') }}</a></li>
                @endif
                    <li class="dropdown">
                        <a href="#" class="menu-item dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ trans('app.language') }}<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="/lang/fi">{{ trans('app.fi') }}</a></li>
                            <li><a href="/lang/en">{{ trans('app.en') }}</a></li>
                            <li><a href="/lang/se">{{ trans('app.se') }}</a></li>
                        </ul>
                    </li>
            </ul>
        </div>
    </div>
</nav>


@yield('content')

</body>
</html>