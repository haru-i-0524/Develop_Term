{{-- layouts/home.blade.phpを読み込む --}}
@extends('layouts.home')


{{-- home.blade.phpの@yield('title')に'Mypage'を埋め込む --}}
@section('title', 'レポート編集')

{{-- home.blade.phpの@yield('content')に以下のタグを埋め込む --}}
@section('content')
   <div class="container mx-auto">
        <div class="title">
            <h3>レポート編集画面</h3>
                <form action="{{ action('Admin\ReportController@update') }}" method="post" enctype="multipart/form-data">
                    
                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    
                    <div class="col-md-8 mx-auto">
                        <!-- shop_name 店名 -->
                        <div class="form-group row">
                            <label class="col-md-2">店名</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="shop_name" value="{{ $report_form->shop_name }}">
                            </div>
                        </div>
                    
                        <!-- postal_code 郵便番号-->
                        <div class="form-group row">
                            <label class="col-md-2">郵便番号</label>
                            <div class="col-md-3">
                                <input type="text" class="form-control" name="postal_code" value="{{ $report_form->postal_code }}">
                            </div>
                        </div>
                    
                        <!-- prefecture 都道府県 -->
                        <div class="form-group row">
                            <label class="col-md-2">都道府県</label>
                            <div class="col-md-8">
                                <select name="pref_code">
                                    <option value="{{ $report_form->pref_code }}" selected>{{ $prefecture->name }}</option>
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
                                <input type="text" class="form-control" name="city" value="{{ $report_form->city }}">
                            </div>
                        </div>
                            
                        <div class="form-group row">
                            <!-- address 番地以下 -->
                            <label class="col-md-2">番地以下</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="address" value="{{ $report_form->address }}">
                            </div>
                        </div>
                        
                        <!-- tel 電話番号 -->
                        <div class="form-group row">
                            <label class="col-md-2">電話番号</label>
                            <div class="col-md-4">
                                <input type="text" class="form-control" name="tel" value="{{ $report_form->tel }}">
                            </div>
                        </div>
                    
                        <!-- url -->
                        <div class="form-group row">
                            <label class="col-md-2">url</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="url" value="{{ $report_form->url }}">
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-8 mx-auto">
                        <!-- title タイトル -->
                        <div class="form-group row">
                            <label class="col-md-2">タイトル</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="title" value="{{ $report_form->title }}">
                            </div>
                        </div>
                    
                        <!-- body 本文 -->
                        <div class="form-group row">
                            <label class="col-md-2">本文</label>
                            <div class="col-md-8">
                                <textarea class="form-control" name="body" raws='10'>{{ $report_form->body }}</textarea>
                            </div>
                        </div>
                    </div>
                    
                    
                        <!-- report_img -->
                    <div class="form-group row">
                        <label class="col-md-2">写真</label>
                        <div class="col-md-8">
                        @if ($report_form->report_path != NULL)
                            @foreach ($report_form->report_paths as $report_path)
                                <div class="col-md-3">
                                    <div class="report_image">
                                        <img src="{{ asset('/storage/img/report/'.$report_form->report_path) }}" style="width: 150px; height: 150; object-fit: cover; border: 2px #808080 solid;">
                                        <label class="img_name">{{ $report_form->img_name }}</label>
                                    </div>
                                </div>
                                
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
                            @endforeach
                        @else
                                <img src="{{ asset('/img/no_image.jpg')}}" style="width: 150px; height: 150px; object-fit: cover; border: 2px #808080 solid;">
                                <label class="img_name">no image</label>
                        @endif
                        </div>
                    
                    <div class="form-group row">
                        <label class="col-md-2">画像(複数可)</label>
                        <div class="col-md-8">
                            
                            
                            
                            <input type="file" class="form-control-file" name="report_image[]" multiple>
                        </div>
                    </div>
                    
                    {{ csrf_field() }}
                    <input type="submit" class="btn btn-primary" value="登録">
                </form>
        </div>
    </div>
@endsection
