{{-- layouts/home.blade.phpを読み込む --}}
@extends('layouts.home')


{{-- home.blade.phpの@yield('title')に'プロフィール新規作成'を埋め込む --}}
@section('title', 'レポート新規作成')

{{-- home.blade.phpの@yield('content')に以下のタグを埋め込む --}}
@section('content')
      <div class="container mx-auto">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h3>レポート新規作成</h3>
                <form action="{{ action('Admin\ReportController@create') }}" method="post" enctype="multipart/form-data">
                    
                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    
                    <!-- shop_name 店名 -->
                    <div class="form-group row">
                        <label class="col-md-2">店名</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="shop_name" value="{{ old('shop_name') }}">
                        </div>
                    </div>
                    
                    <!-- postal_code 郵便番号-->
                    <div class="form-group row">
                        <label class="col-md-2">郵便番号</label>
                        <div class="col-md-3">
                            <input type="text" class="form-control" name="postal_code" value="{{ old('postal_code') }}">
                        </div>
                    </div>
                    
                    <!-- prefecture 都道府県 -->
                    <div class="form-group row">
                        <label class="col-md-2">都道府県</label>
                        <div class="col-md-8">
                            <select name="pref_code">
                                @foreach($prefectures as $prefecture)
                                    <option value="{{ $prefecture->code }}">{{ $prefecture->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                        
                    <div class="form-group row">    
                        <!-- city 市町村名 -->
                        <label class="col-md-2">市区町村</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="city" value="{{ old('city') }}">
                        </div>
                    </div>
                        
                    <div class="form-group row">
                        <!-- address 番地以下 -->
                        <label class="col-md-2">番地以下</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="" value="{{ old('') }}">
                        </div>
                    </div>
                    
                    <!-- tel 電話番号 -->
                    <div class="form-group row">
                        <label class="col-md-2">電話番号</label>
                        <div class="col-md-4">
                            <input type="text" class="form-control" name="" value="{{ old('') }}">
                        </div>
                    </div>
                    
                    <!-- url -->
                    <div class="form-group row">
                        <label class="col-md-2">url</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="" value="{{ old('') }}">
                        </div>
                    </div>
                    
                    <!-- title タイトル -->
                    <div class="form-group row">
                        <label class="col-md-2">タイトル</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="title" value="{{ old('title') }}">
                        </div>
                    </div>
                    
                    <!-- body 本文 -->
                    <div class="form-group row">
                        <label class="col-md-2">本文</label>
                        <div class="col-md-8">
                            <textarea class="form-control" name="body" raws='10'>{{ old('body') }}</textarea>
                        </div>
                    </div>
                    
                    <!-- report_img -->
                    <div class="form-group row">
                        <label class="col-md-2">画像(複数可)</label>
                        <div class="col-md-8">
                            <input type="file" class="form-control-file" name="images[]" multiple>
                        </div>
                    </div>
                    
                    {{ csrf_field() }}
                    <input type="submit" class="btn btn-primary" value="登録">
                </form>
            </div>        
        
        </div>
    </div>
@endsection