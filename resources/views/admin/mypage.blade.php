{{-- layouts/home.blade.phpを読み込む --}}
@extends('layouts.home')


{{-- home.blade.phpの@yield('title')に'Mypage'を埋め込む --}}
@section('title', 'Mypage')

{{-- home.blade.phpの@yield('content')に以下のタグを埋め込む --}}
@section('content')
   <div class="container mx-auto">
        <div class=title>
            <p>マイページ</p>
            <ul class="link">
                <li><a class="link" href="{{ action('Admin\ProfileController@add') }}">新規作成</a></li>
                <li><a class="link" href="{{ action('Admin\ProfileController@edit') }}">編集</a></li>
            </ul>
        </div>
    </div>
@endsection
