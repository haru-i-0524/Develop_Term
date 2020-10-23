{{-- layouts/home.blade.phpを読み込む --}}
@extends('layouts.home')


{{-- home.blade.phpの@yield('title')に'プロフィール新規作成'を埋め込む --}}
@section('title', 'プロフィール新規作成')

{{-- home.blade.phpの@yield('content')に以下のタグを埋め込む --}}
@section('content')
    <div class="container" style="background-image: url('{{asset('/img/top.jpg')}}');">
        <div class="top-wrapper">
            <p>プロフィール新規作成</p>
        </div>
    </div>
@endsection
