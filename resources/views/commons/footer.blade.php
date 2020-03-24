<!-- footer -->
    <div class="footer-contentsarea overlay1">
        <div class="bg"></div>
            <div class="footer-text">
                <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <div class="footer-text-disc p-2">
                            <div class="footer-text-title">
                                小さな命が新しい家族を待っています
                            </div>
                            <div class="footer-text-contents mt-2">
                                Cats Cloverは猫の殺処分ゼロを目指すため、2015年に設立しました。
                                消えてしまうはずだった命を保護し、新しい家族に出会えるよう支援しています。
                                一つでも多くの尊い命が、新しい幸せに巡り会えますように。
                            </div>
                            
                        </div>
                    </div>
                    <div class="col-md-6">
                        
                        <div class="footer-text-logo p-5">
                            <div>
                            <img src="https://catsclover.s3.amazonaws.com/myprefix/cats_clover_logo_green_touka_stroke.PNG" class="example1">
                            </div>
                        </div>
                        
                    </div>
                </div>
                </div>
            </div>
            
            <div class="footer-link">
                <ul>@if (Auth::check())
                    <li><a href="/">Home</a></li>
                    <li><a href="{{ action('UsersController@applyings', Auth::user()->id) }}">マイページ</a></li>
                    <li><a href="{{ route('logout.get', "") }}">ログアウト</a></li>
                    @else
                    <li><a href="/">Home</a></li>
                    <li><a href="{{ route('signup.get', "") }}">会員登録</a></li>
                    <li><a href="{{ route('login', "") }}">ログイン</a></li>
                    @endif
                </ul>
            </div>
            
    </div>
    <footer class="text-center pt-3 pb-3 small">
  	© All rights reserved by cats-clover.
    </footer>


