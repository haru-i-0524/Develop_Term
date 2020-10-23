<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    
    // 1.add 2.create 3.edit 4.update 5.delete 6.index
    
    // 1.add
    public function add()
    {
        return view('admin.profile.create');
    }
    
    
    // 2.create
    public function create(Request $request)
    {
        
        
        
        return redirect('admin/profile/create');
    }
    
    
    // 3.edit
    public function edit(Request $request)
    {
        
        
        
        return view('admin.profile.edit', ['profile_form' => $profile]);
    }
    
    // 4.update
    public function update(Request $request)
    {
        
        
        
        return redirect('admin/profile/edit');
    }

    // 5.delete
    public function delete(Request $request)
    {
        
      
        
        return redirect('admin/profile/');
    }
    
    // 6.index (Mypage)
    public function index(Request $request)
    {
        
        
        return view('admin.profile.index', ['posts' => $posts, 'cond_name' => $cond_name]);
    }
    
    
    
}
