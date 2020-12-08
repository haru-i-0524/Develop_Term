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
                            <input type="text" class="form-control" name="address" value="{{ old('address') }}">
                        </div>
                    </div>
                    
                    <!-- tel 電話番号 -->
                    <div class="form-group row">
                        <label class="col-md-2">電話番号</label>
                        <div class="col-md-4">
                            <input type="text" class="form-control" name="tel" value="{{ old('tel') }}">
                        </div>
                    </div>
                    
                    <!-- url -->
                    <div class="form-group row">
                        <label class="col-md-2">url</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="url" value="{{ old('url') }}">
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
                            <script>
                                $(function() {
                                    // フォームカウント
                                    var frm_cnt = 0;

                                    // clone object
                                    $(document).on('click', 'span.add', function() {
                                        var original = $('#form_block\\[' + frm_cnt + '\\]');
                                        var originCnt = frm_cnt;

                                        frm_cnt++;      

                                        original.clone()
                                        .hide()
                                        .insertAfter(original)
                                        .attr('id', 'form_block[' + frm_cnt + ']') // クローンのid属性を変更。
                                        .find("input[type='file']")
                                        .end() // 一度適用する
                                        .find('input, text').each(function(idx, obj) {
                                            $(obj).attr({
                                                id: $(obj).attr('id').replace(/\[[0-9]\]+$/, '[' + frm_cnt + ']'),
                                                name: $(obj).attr('name').replace(/\[[0-9]\]+$/, '[' + frm_cnt + ']')
                                            });
                                            $(obj).val('');
                                        });

                                        // clone取得
                                        var clone = $('#form_block\\[' + frm_cnt + '\\]');
                                        clone.children('span.close').show();
                                        clone.slideDown('slow');

                                        // close object
                                        $(document).on('click', 'span.close', function() {
                                            var removeObj = $(this).parent();
                                            removeObj.fadeOut('fast', function() {
                                                removeObj.remove();
                                                // 番号振り直し
                                                frm_cnt = 0;
                                                $(".form-block[id^='form_block']").each(function(index, formObj) {
                                                    if ($(formObj).attr('id') != 'form_block[0]') {
                                                        frm_cnt++;
                                                        $(formObj)
                                                        .attr('id', 'form_block[' + frm_cnt + ']') // id属性を変更。
                                                        .find('input, text').each(function(idx, obj) {
                                                            $(obj).attr({
                                                                id: $(obj).attr('id').replace(/\[[0-9]\]+$/, '[' + frm_cnt + ']'),
                                                                name: $(obj).attr('name').replace(/\[[0-9]\]+$/, '[' + frm_cnt + ']')
                                                            });
                                                        });
                                                    }
                                                });
                                            });
                                        });
                                    });
                                });
                            </script>
                            <div class="form-block" id="form_block[0]">
                                <span class="close", title="close" style="display: none; padding: 5px 10px; margin-bottom: 5px; border: 1px solid; border-radius: 3px;">-</span>
                                <p>title:<input type="text" name="img_name[0]" id="img_name[0]"></p>
                                <p>photo:<input type="file" class="form-control-file" name="report_image[0]" id="report_image[0]"></p>
                            </div>
                            <div class="form-block" id="form_add">
                                <span class="add" title="Add" style="padding: 5px 10px; margin-bottom: 5px; border: 1px solid; border-radius: 3px;">+</span>
                            </div>
                        </div>
                    </div>
                    
                    {{ csrf_field() }}
                    <input type="submit" class="btn btn-primary" value="登録">
                </form>
            </div>        
        
        </div>
    </div>
@endsection