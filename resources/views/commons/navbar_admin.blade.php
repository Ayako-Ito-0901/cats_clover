<header class="">
    <nav class="navbar navbar-expand-sm navbar-warning bg-navbar border-bottom"> 
    <div id="admin_topvar">
        <ul>
            <li>
            <a class="navbar-logo" href="{{ url('/admin/home') }}">CatsClover管理者ページ</a>
            </li>
            @if (Auth::check())
             <li class="nav-item" id="admin-navbar">
                <a href="{{ route('admin.logout') }}" class="nav-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fas fa-sign-out-alt"></i>ログアウト
                </a>
                <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            </li>
            @endif
        </ul>    
    </div>     
    
    <!-- bootstrapのハンバーガーメニュー
    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#sidebar">
            <span class="navbar-toggler-icon"></span>
    </button>
    -->
    
        <div id="nav-drawer">
            <input id="nav-input" type="checkbox" class="nav-unshown">
                <label id="nav-open" for="nav-input"><span></span></label>
                <label class="nav-unshown" id="nav-close" for="nav-input"></label>
                <div id="nav-content">
                    <div class="hambargar-title">
                    MENU
                    </div>
                    <div class="hambargar-sidebar">
                        <ul class="nav-sidebar">
                            <li @if(Request::is('admin/member*')) class="active" @endif><a href="{{ route('member.index') }}">会員一覧</a></li>
                            <li @if(Request::is('admin/cats*')) class="active" @endif><a href="{{ route('cats.index') }}">Cats一覧</a></li>
                            <li @if(Request::is('admin/photo*')) class="active" @endif><a href="{{ route('admin.photoindex') }}">Photo一覧</a></li>
            
                        </ul>
</div> 
                
                </div>
        </div>
    
    </nav>    
</header>

