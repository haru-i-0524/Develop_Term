<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReportController extends Controller
{
    
    // 1.add 2.create 3.edit 4.update 5.delete 6.index
    
    // 1.add
    public function add()
    {
        return view('admin.report.create');
    }
    
    
    // 2.create
    public function create(Request $request)
    {
        
        
        
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
