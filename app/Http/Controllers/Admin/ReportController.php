<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;

use App\User;
use App\Prefecture;
use App\Report;
use App\ReportPhoto;

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
        
        $report->shop_name = $request->shop_name;
        $report->postal_code = $request->postal_code;
        $report->pref_code = $request->pref_code;
        $report->city = $request->city;
        $report->address = $request->address;
        $report->tel = $request->tel;
        $report->url = $request->url;
        $report->title = $request->title;
        $report->body = $request->body;
        $report->user_id = $user_id;
        
        $report->save();
        
    
        $photos = $request['report_image'];
        $photo_names = $request['img_name'];
        
        if( $photos != null ) {
            
            for($i = 0; $i < count($photos); $i++){
                
                if ($photos[$i]->isValid()) {
                
                    $path = $photos[$i]->store('public/img/report');
                    
                    $report_photo = new ReportPhoto;
                    
                    $report_photo->report_path = basename($path);
                
                    $report_photo->report_id = $report->id;
                    $report_photo->img_name = $photo_names[$i];
                    $report_photo->save();
                }  
            }
        
        }
    
        return redirect('admin/mypage?user_id='. $user_id);
    }
    
    
    // 3.edit
    public function edit(Request $request)
    {
        
        
        // $report = Report::where('reportid', )->
        
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
    
    
}
