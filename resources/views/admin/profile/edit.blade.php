{{-- layouts/home.blade.phpを読み込む --}}
@extends('layouts.home')


{{-- home.blade.phpの@yield('title')に'プロフィール編集'を埋め込む --}}
@section('title', 'プロフィール編集')

{{-- home.blade.phpの@yield('content')に以下のタグを埋め込む --}}
@section('content')
    <div class="container mx-auto">
        <div class=title>
            <p>プロフィール編集</p>
        </div>
    </div>
@endsection
