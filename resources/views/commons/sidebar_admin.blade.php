<div class="sidebar-contents">
    <ul class="nav-sidebar">
                        
                        <li @if(Request::is('admin/member*')) class="active" @endif><a href="{{ route('member.index') }}">会員一覧</a></li>
                        <li @if(Request::is('admin/cats*')) class="active" @endif><a href="{{ route('cats.index') }}">Cats一覧</a></li>
                        <li @if(Request::is('admin/photo*')) class="active" @endif><a href="{{ route('admin.photoindex') }}">Photo一覧</a></li>
            
    </ul>
</div>              
               
