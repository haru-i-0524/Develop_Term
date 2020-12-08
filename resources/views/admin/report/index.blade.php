{{-- layouts/home.blade.phpを読み込む --}}
@extends('layouts.home')


{{-- home.blade.phpの@yield('title')に'Mypage'を埋め込む --}}
@section('title', 'レポート')

{{-- home.blade.phpの@yield('content')に以下のタグを埋め込む --}}
@section('content')
   <div class="container mx-auto">
        <div class=title>
            <p></p>
            <div class="row">
                    <div class="report col-md-8 mx-auto">
                        <h3>Report</h3>
                        <form action="{{ action('Admin\ReportController@index') }}" method="get">
                            <div class="row">
                                <div class="col-md-8">
                                <!-- report_img 写真 -->
                                    <div class="report_image">
                                        @if($report->image_path == null)
                                            <div id="carouselExampleIndicatiors" class="carousel slide" data-ride="carousel">
                                                <div class="carousel-inner">
                                                    <div class="carousel-item active">
                                                        <img class="d-block w-100" src="{{ asset('/img/no_image.jpg') }}">
                                                    </div>
                                                </div>
                                            </div>
                                        @else
                                            <div id="carouselExampleIndicatiors" class="carousel slide" data-ride="carousel">
                                                <div class="carousel-inner">
                                                    @foreach( $reports as $report )
                                                    <div class="carousel-item active">
                                                        <img class="d-block w-100" src="{{ asset('/storage/img/report/'.$report->report_path) }}">
                                                        <div class="carousel-caption d-none d-md-block">
                                                            <h5>{{ $report->img_name}}</h5>
                                                        </div> 
                                                    </div>
                                                    @endforeach
                                                </div>
                                            </div>
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
                                    
                                </div>
                                
                                
                                <div class="col-md-4">
                                    
                                    
                                </div>
                                <div class="report_btn col-md-8">
                                    <a class="btn report_edit" href="{{ action('Admin\ReportController@edit', ['user_id' => Auth::id()]) }}">編集</a>
                                    <a class="btn report_delete" href="{{ action('Admin\ReportController@delete', ['user_id' => Auth::id()]) }}">削除</a>
                                </div>
                                
                            </div>
                        </form>
                    </div>
                </div>
        </div>
    </div>
@endsection
