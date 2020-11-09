{{-- layouts/home.blade.phpを読み込む --}}
@extends('layouts.home')


{{-- home.blade.phpの@yield('title')に'home'を埋め込む --}}
@section('title', 'home')

{{-- home.blade.phpの@yield('content')に以下のタグを埋め込む --}}
@section('content')
    <div class="container mx-auto">
        <div class="top-wrapper"  style="background-image: url('{{asset('/img/top.jpg')}}');">
            
            <!-- ゲスト -->
            @guest
                <div class="btn-wrapper">
                    <!-- 通常のログイン(mail & password) -->
                    <a href="{{ route('register') }}" class="btn signup">新規登録はこちら</a>
                    
                    <p>or sign up with</p>
                    <!-- ソーシャルログイン socialite -->
                    <a href="#" class="btn google"><span class="fab fa-google"></span>googleで登録</a>
                    
                    <a href="#" class="btn twitter"><span class="fab fa-twitter"></span>Twitterで登録</a>
                    
                    <a href="#" class="btn facebook"><span class="fab fa-facebook-f"></span>facebookで登録</a>
                
                </div>
            @endguest
            
        </div>
        
        <div class="">
            <!-- 検索 -->
            
        </div>
        
        <div class="">
            <!-- 最新のレポート -->
            
        </div>
        
        <div class="">
            <!-- レポートの多いお店 -->
            
        </div>      
        
    </div>
@endsection
