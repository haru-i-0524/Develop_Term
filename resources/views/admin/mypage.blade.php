{{-- layouts/home.blade.phpを読み込む --}}
@extends('layouts.home')


{{-- home.blade.phpの@yield('title')に'Mypage'を埋め込む --}}
@section('title', 'Mypage')

{{-- home.blade.phpの@yield('content')に以下のタグを埋め込む --}}
@section('content')
   <div class="container mx-auto">
        <div class="title">
            <h2>Mypage</h2>
            
            @if( $profile == null )
                <div class="row">
                    <div class="add_profile col-md-8 mx-auto">
                        <hr color="#c0c0c0">
                        <h3>profile</h3>
                        <div class="add_report_btn col-md-8">
                            <p class="profile_message">プロフィールを登録してください</p>
                            <a class="btn profile_add" href="{{ action('Admin\ProfileController@add', ['user_id' => Auth::id()]) }}">新規作成</a>
                        </div>
                        <hr color="#c0c0c0">
                    </div>
                </div>
            @else
                <div class="row">
                    <div class="profile col-md-8 mx-auto">
                        <form action="{{ action('Admin\MypageController@index') }}" method="get">
                            <hr color="#c0c0c0">
                            <h3>profile</h3>
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
                                        <label class="col-md-4">表示名：</label>
                                        <div class="col-md-4">
                                            {{ $profile->displayname }}
                                        </div>
                                    </div>
                                    
                                    <!-- gender 性別 -->
                                    <div class="gender-group row" style="margin: 15px 10px;">
                                        <label class="col-md-4">性別：</label>
                                        <div class="col-md-4">
                                            {{ $profile->getGenderString() }}
                                        </div>
                                    </div>
                                    
                                    <!-- birthday 誕生日 -->
                                    <div class="birthday-group row" style="margin: 15px 10px;">
                                        <label class="col-md-4">誕生日：</label>
                                        <div class="col-md-4">
                                            {{ $profile->birthday }}
                                        </div>
                                    </div>
                                    
                                    <!-- prefecture 県 -->
                                    <div class="pref-group row" style="margin: 15px 10px;">
                                        <label class="col-md-4">都道府県：</label>
                                        <div class="col-md-4">
                                            {{ $prefecture->name }}
                                        </div>
                                    </div>
                                    
                                </div>
                            
                                <div class="col-md-12">
                                    <!-- introduction 自己紹介 -->
                                    <div class="introduction-group row" style="margin: 20px 10px;">
                                        <label class="col-md-4">自己紹介：</label>
                                        <div class="col-md-8">
                                            {{ $profile->introduction }}
                                        </div>
                                    </div>
                                </div>
                                <div class="profile_btn col-md-12">
                                    <a class="btn profile_edit" href="{{ action('Admin\ProfileController@edit', ['user_id' => Auth::id()]) }}">編集</a>
                                    <a class="btn profile_delete" href="{{ action('Admin\ProfileController@delete', ['user_id' => Auth::id()]) }}">削除</a>
                                </div>
                            </div>
                            
                            <hr color="#c0c0c0">
                            <h3>report</h3>
                            <div class="row">
                                <div class="add_report_btn col-md-12">
                                    <a class="btn report_add" href="{{ action('Admin\ReportController@add', ['user_id' => Auth::id()]) }}">新規作成</a></li>
                                </div>
                                @if( $reports == null )
                                    <p>レポートが投稿されていません</p>
                                @else
                                    <div class="report col-md-12">
                                    @foreach($reports as $report)
                                        <div class="report_post col-md-3">
                                            <a href="">
                                                <span class="post_img">
                                                    @if($report->photos == null)
                                                        <img src="{{ asset('/img/no_image.jpg') }}" style="width: 100%; object-fit: cover; border: 2px #808080 solid;">
                                                    @else
                                                        @foreach($report->photos as $photo)
                                                            <img src="{{ secure_asset('storage/img/report/'.$photo->report_path) }}" style="width: 100%; object-fit: cover; border: 2px #808080 solid;">
                                                        @endforeach
                                                    @endif
                                                </span>
                                                <span class="post_title">{{ $report->title }}</span>
                                            </a>
                                        </div>
                                    @endforeach
                                    </div>
                                @endif
                            </div>
                            <hr color="#c0c0c0">
                        </form>
                    </div>
                </div>
            @endif
            
        </div>
    </div>
@endsection

