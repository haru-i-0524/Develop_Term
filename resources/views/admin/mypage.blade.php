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
            </ul>
            <div class="row">
                <div class="profile col-md-8 mx-auto">
                    <form action="{{ action('Admin\ProfileController@summary') }}" method="get">
                        <div class="row">
                            
                            <div class="col-md-4">
                            <!-- img プロフィール写真 -->
                                <div class="profile_image">
                                    @if($profile->image_path == null)
                                        <img src="{{ asset('/img/no_image.jpg')}}" style="width: 200px; height: 200px; object-fit: cover; border: 2px #808080 solid;">
                                    @else
                                        <img src="{{ asset('/storage/img/profile/'.$profile->image_path) }}" style="width: 200px; height: 200px; object-fit: cover; border: 2px #808080 solid;">
                                    @endif
                                </div>
                            </div>
                            
                            <div class="col-md-8">
                                <!-- displayname 表示名 -->
                                <div class="displayname-group row" style="margin: 15px 10px;">
                                    <label class="col-md-4">表示名</label>
                                    <div class="col-md-4">
                                        {{ $profile->displayname }}
                                    </div>
                                </div>
                                    
                                <!-- gender 性別 -->
                                <div class="gender-group row" style="margin: 15px 10px;">
                                    <label class="col-md-4">性別</label>
                                    <div class="col-md-4">
                                        {{ $profile->getGenderString() }}
                                    </div>
                                </div>
                                    
                                <!-- birthday 誕生日 -->
                                <div class="birthday-group row" style="margin: 15px 10px;">
                                    <label class="col-md-4">誕生日</label>
                                    <div class="col-md-4">
                                        {{ $profile->birthday }}
                                    </div>
                                </div>
                                    
                                <!-- prefecture 県 -->
                                <div class="pref-group row" style="margin: 15px 10px;">
                                    <label class="col-md-4">都道府県</label>
                                    <div class="col-md-4">
                                        {{ $prefecture->name }}
                                    </div>
                                </div>
                                    
                            </div>
                            
                            <div class="col-md-8">
                                <!-- introduction 自己紹介 -->
                                <div class="introduction-group row" style="margin: 20px 10px;">
                                    <label class="col-md-4">自己紹介</label>
                                    <div class="col-md-8">
                                        {{ $profile->introduction }}
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <li><a class="link" href="{{ action('Admin\ProfileController@edit', ['id' => $profile->id ]) }}">編集</a></li>
                            </div>
                        </div>
                    </form>
                </div>
                
            </div>
            
            
        </div>
    </div>
@endsection
