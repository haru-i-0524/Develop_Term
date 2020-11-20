<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;

use App\User;
use App\Prefecture;
use App\Report;
use App\Reportphoto;

class ReportController extends Controller
{
    
    // 1.add 2.create 3.edit 4.update 5.delete 6.index
    
    // middlewareによる認証制限
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    // 1.add
    public function add()
    {
        $prefectures = Prefecture::all();
        
        return view('admin.report.create', ['prefectures' => $prefectures]);
    }
    
    
    // 2.create
    public function create(Request $request)
    {
         // Varidationを行う
        $this->validate($request, Report::$rules);
        
        // ログインしているユーザーIDを取得
        $user_id = Auth::id();
        
        $report = new Report;
        $form = $request->all();
        
        // フォームから送信されてきた情報を削除
        // _token　削除
        unset($form['_token']);
        
        // データベースに保存
        // $report
        $report->fill($form)->save();
        
        
        $images = array();
        // file('report_image')にデータがあるときだけ処理する
        if ($files = $request->file('images')) {
            // 
            foreach ( $images as $image ) {
                
                $report_photo = new Reportphoto;
                
                $path = $request->file()->store('public/img/report');
                $report_photo->report_path = basename($path);
                
                // フォームから送信されてきた情報を削除
                // profile_image　削除
                unset($form['report_image']);
            }
        }
        
        
        
        // $reportのデータにuser_idの情報を追加
        $report->user_id = $user_id;
        
        dd($request);
        // データベースに保存
        // $report
        // $report-> ->save();
        // $report_photo
        // $report_photo-> ->save();
        
        return redirect('admin/report/create');
    }
    
    
    // 3.edit
    public function edit(Request $request)
    {
        
        
        
        return view('admin.report.edit');
    }
    
    // 4.update
    public function update(Request $request)
    {
        
        
        
        return redirect('admin/report/edit');
    }
    
    // 5.delete
    public function delete(Request $request)
    {
        
      
        
        return redirect('admin/report/');
    }
    
    // 6.index
    public function index(Request $request)
    {
        
        
        
        return view('admin.report.index');
    }
    
    // 7.summary(Mypage)
    public function summary(Request $request)
    {
        
        return view('admin.mypage');
    }
    
}
