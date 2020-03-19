<header class="">
    <nav class="navbar navbar-expand-sm navbar-warning bg-navbar"> 
        <a class="navbar-logo" href="/"><img src="https://catsclover.s3.amazonaws.com/myprefix/cats_clover_logo.PNG" class="logo-img"></a>
         
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#nav-bar">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="nav-bar">
            <ul class="navbar-nav mr-auto"></ul>
            <ul class="navbar-nav">
                @if (Auth::check())
                    <li class="nav-item nav-link">ようこそ、{{ Auth::user()->name }}様</li>
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">会員メニュー</a>
                        <ul class="dropdown-menu dropdown-menu-right">
                            <li class="dropdown-item"><a href="{{ action('UsersController@applyings', Auth::user()->id) }}"><i class="fas fa-user-alt"></i>マイページ</a></li>
                            <li class="dropdown-divider"></li>
                            <li class="dropdown-item"><a href="{{ route('logout.get', "") }}"><i class="fas fa-sign-out-alt"></i>ログアウト</a></li>
                        </ul>
                    </li>
                @else
                    <li class="nav-item"><a href="{{ route('signup.get', "") }}" class="nav-link"><i class="fas fa-user-plus"></i> 会員登録</a></li>
                    <li class="nav-item"><a href="{{ route('login', "") }}" class="nav-link"><i class="fas fa-sign-in-alt"></i> ログイン</a></li>
                @endif
            </ul>
        </div>
    </nav>
</header>