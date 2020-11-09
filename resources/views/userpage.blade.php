{{-- layouts/home.blade.phpを読み込む --}}
@extends('layouts.home')


{{-- home.blade.phpの@yield('title')に'プロフィール新規作成'を埋め込む --}}
@section('title', 'ユーザーページ')

{{-- home.blade.phpの@yield('content')に以下のタグを埋め込む --}}
@section('content')
      <div class="container mx-auto">
        <div class=title>
            <p>ユーザーページ</p>
        </div>
    </div>
@endsection