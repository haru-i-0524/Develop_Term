{{-- layouts/home.blade.phpを読み込む --}}
@extends('layouts.home')


{{-- home.blade.phpの@yield('title')に'Mypage'を埋め込む --}}
@section('title', 'レポート一覧')

{{-- home.blade.phpの@yield('content')に以下のタグを埋め込む --}}
@section('content')
   <div class="container mx-auto">
        <div class=title>
            <p>レポート一覧</p>
        </div>
    </div>
@endsection
