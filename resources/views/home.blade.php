{{-- layouts/home.blade.phpを読み込む --}}
@extends('layouts.home')


{{-- home.blade.phpの@yield('title')に'home'を埋め込む --}}
@section('title', 'home')

{{-- home.blade.phpの@yield('content')に以下のタグを埋め込む --}}
@section('content')
    <div class="container mx-auto">
        <div class="top-wrapper"  style="background-image: url('{{asset('/img/top.jpg')}}');">
            
            @guest
                <div class="btn-wrapper">
                    <a href="{{ route('register') }}" class="btn signup">新規登録はこちら</a>
                    <p>or sign up with</p>
                    <a href="#" class="btn google">googleで登録</a>
                    <a href="#" class="btn twitter">Twitterで登録</a>
                    <a href="#" class="btn facebook">facebookで登録</a>
                
                </div>
            @endguest
            
            
            
        </div>
    </div>
@endsection
