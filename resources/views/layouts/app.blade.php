<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>CatsClover</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        
        <!-- ↓今回記載 -->
        <link rel="stylesheet" type="text/css" href="/css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="/css/mysheet.css">
        <!-- <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}"> -->
        
        <!-- CDNのためコメントアウト
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
        -->
        <!-- bootstrap-datepickerを読み込む -->
        <link rel="stylesheet" type="text/css" href="../bootstrap-datepicker-1.6.4-dist/css/bootstrap-datepicker.min.css">
        <script type="text/javascript" src="../bootstrap-datepicker-1.9.0-dist/js/bootstrap-datepicker.min.js"></script>
        <script type="text/javascript" src="../bootstrap-datepicker-1.9.0-dist/locales/bootstrap-datepicker.ja.min.js"></script>
        
        
    </head>

    <body>
    <div id="wrapper">
        
        @include('commons.navbar')
        
        
            @include('commons.error_messages')
            @yield('mainimage')
        
        <div class="container">
            @yield('content')
        </div>
       
        
            @include('commons.footer')
            
        
        
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
        <script defer src="https://use.fontawesome.com/releases/v5.7.2/js/all.js"></script>
    </div>
    </body>
    
    @yield('script2')
    @yield('script3')
    
</html>
