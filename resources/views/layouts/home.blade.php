<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        {{-- 各ページごとにtitleタグを入れるために@yieldで空けておきます。 --}}
        <title>@yield('title')</title>

        <!-- Scripts -->
        {{-- Laravel標準で用意されているJavascriptを読み込みます --}}
        <script src="{{ secure_asset('js/app.js') }}" defer></script>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        {{-- Laravel標準で用意されているCSSを読み込みます --}}
        <link href="{{ secure_asset('css/app.css') }}" rel="stylesheet">
        {{-- この章の後半で作成するCSSを読み込みます --}}
        <link href="{{ secure_asset('css/home.css') }}" rel="stylesheet">
        {{-- headerのCSS --}}
        <link href="{{ secure_asset('css/parts.css') }}" rel="stylesheet">
        {{-- imgを読み込む --}}
        <link src="{{ asset('img') }}">
        {{-- プロフィール写真　保存場所 --}}
        <link src="{{ asset('img/profile') }}">
        {{-- レポート写真　保存場所 --}}
        <link src="{{ asset('img/report') }}">
        {{--  FontAwesomeのCSSファイルを読み込む--}}
        <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css", rel="stylesheet">
    
        <!-- OGP -->
        <meta property="og:url" content="ページのURL" />
        <meta property="og:title" content="ページのタイトル" />
        <meta property="og:type" content="ページのタイプ">
        <meta property="og:description" content="記事の抜粋" />
        <meta property="og:image" content="画像のURL" />
        <meta name="twitter:card" content="カード種類" />
        <meta name="twitter:site" content="@Twitterユーザー名" />
        <meta property="og:site_name" content="サイト名" />
        <meta property="og:locale" content="ja_JP" />
        <meta property="fb:app_id" content="appIDを入力">
        
    </head>
    <body>
            
        <!-- header -->
        @include('parts.header')
            
            
            
        {{-- コンテンツをここに入れるため、@yieldで空けておきます。 --}}
        @yield('content')
            
            
            
        <!-- footer -->
        @include('parts.fooder')
        
        
        
    </body>
    
    
</html>