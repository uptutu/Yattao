
<header>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <a class="navbar-brand" href="{{ route('home') }}">YATTAO</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse " id="navbarCollapse">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item {{ active_class(if_route('home')) }}">
                    <a class="nav-link hvr-grow" href="{{ route('home') }}">主页<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item {{ active_class(if_route('msgs.index')) }}">
                    <a class="nav-link hvr-grow" href="{{ route('msgs.index') }}">留言板</a>
                </li>
                <li class="nav-item">
                    <a class="hvr-grow nav-link {{ active_class(if_route('topics.show') or if_route('topics.index')) }}" href="{{ route('topics.index') }}">日志</a>
                </li>
            </ul>
            {{--Right side Of Navbar--}}
            <ul class="navbar-nav justify-content-end">
                {{--Authentication Links--}}
                @guest
                    <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">登录</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">注册</a></li>
                    @else
                        <li class="nav-item pr-2"><a href="{{route('msgs.index')}}" class="nav-link"><span class="fa fa-lg fa-plus" aria-hidden="true"></span></a></li>
                        <li class="nav-item pr-2"><a href="{{ route('notifications.index') }}" class="nav-link"><span class="badge badge-pill badge-{{ Auth::user()->notification_count > 0 ? 'danger' : 'secondary'  }}" title="消息提醒">{{ Auth::user() ->notification_count}}</span></a></li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="user-avatar pull-left" style="margin-right: 8px; margin-top: -5px;">
                                <img src="{{ Auth::user()->avatar }}" class="img-responsive img-circle" width="30px" height="30px">
                                </span>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>
                            <div class="dropdown-menu animated fadeIn" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item" href="{{ route('users.show', Auth::id()) }}">
                                    <i class="fa fa-user mr-2" aria-hidden="true"></i>个人中心
                                </a>
                                <a class="dropdown-item" href="{{ route('users.edit', Auth::id()) }}">
                                    <i class="fa fa-edit mr-2" aria-hidden="true"></i>编辑资料
                                </a>
                                <a class="dropdown-item" href="#" onclick="document.getElementById('logout-form').submit();return false">
                                    <i class="fa fa-sign-out mr-2" aria-hidden="true"></i>退出登录
                                </a>

                                <form method="POST" action="{{ route('logout') }}" id="logout-form">
                                    {{ csrf_field() }}
                                </form>
                            </div>
                        </li>
                        @endguest
            </ul>
        </div>
    </nav>
</header>
