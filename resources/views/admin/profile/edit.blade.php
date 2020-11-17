{{-- layouts/home.blade.phpを読み込む --}}
@extends('layouts.home')


{{-- home.blade.phpの@yield('title')に'プロフィール編集'を埋め込む --}}
@section('title', 'プロフィール編集')

{{-- home.blade.phpの@yield('content')に以下のタグを埋め込む --}}
@section('content')
    <div class="container mx-auto">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>プロフィール編集</h2>
                <form action="{{ action('Admin\ProfileController@update') }}" method="post" enctype="multipart/form-data">
                    
                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    
                    <!-- displayname 表示名 -->
                    <div class="form-group row">
                        <label class="col-md-2">表示名</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="displayname" value="{{ $profile_form->displayname }}">
                        </div>
                    </div>
                    
                    <!-- gender 性別 -->
                    <div class="form-group row">
                        <label class="col-md-2">性別</label>
                        <div class="col-md-8">
                            <select name="gender">
                                <option value="{{ $profile_form->gender }}" selected>{{ $profile_form->getGenderString() }}</option>
                                <option value="0">回答しない</option>
                                <option value="1">男性</option>
                                <option value="2">女性</option>
                                <option value="9">その他</option>
                            </select>
                        </div>
                    </div>
                    
                    <!-- birthday 誕生日 -->
                    <div class="form-group row">
                        <label class="col-md-2">誕生日</label>
                        <div class="col-md-8">
                            <input type="date" name="birthday" value="{{ $profile_form->birthday }}">
                        </div>
                    </div>
                    
                    <!-- prefecture 県 -->
                    <div class="form-group row">
                        <label class="col-md-2">都道府県</label>
                        <div class="col-md-8">
                            <select name="pref_code">
                                <option value="{{ $profile_form->pref_code}}" selected>{{ $prefecture->name }}</option>
                                @foreach($prefectures as $prefecture)
                                    <option value="{{ $prefecture->code }}">{{ $prefecture->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    
                    <!-- introduction 自己紹介 -->
                    <div class="form-group row">
                        <label class="col-md-2">自己紹介</label>
                        <div class="col-md-8">
                            <textarea class="form-control" name="introduction" rows="10">{{ $profile_form->introduction }}</textarea>
                        </div>
                    </div>
                    
                    <!-- img プロフィール写真 -->
                    <div class="form-group row">
                        <label class="col-md-2">プロフィール画像</label>
                        <div class="col-md-8">
                            <input type="file" class="form-control-file" name="profile_image">
                            <div class="form-text text-info">
                                設定中: {{ $profile_form->image_path }}
                            </div>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" name="remove" value="true">画像を削除
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-10">
                            <input type="hidden" name="id" value="{{ $profile_form->id }}">
                            {{ csrf_field() }}
                            <input type="submit" class="btn btn-primary" value="更新">
                        </div>
                    </div>
                </form>
            </div>    
        </div>
    </div>
@endsection
