<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;

use App\User;
use App\Prefecture;
use App\Profile;


class ProfileController extends Controller
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
        
        return view('admin.profile.create', ['prefectures' => $prefectures]);
    }
    
    
    // 2.create
    public function create(Request $request)
    {
        // Varidationを行う
        $this->validate($request, Profile::$rules);
        
        // ログインしているユーザーIDを取得
        $profile->user_id = User::find('id');
        
        $profile = new Profile;
        $form = $request->all();
        
        // $profiles->image_pathに画像パスを保存
        if (isset($form['profile_image'])) {
            $path = $request->file('profile_image')->store('public/img/profile');
            $profile->image_path = basename($path);
        } else {
            $profile->image_path = null;
        }
        
        // フォームから送信されてきた情報を削除
        // _token　削除
        unset($form['_token']);
        // profile_image　削除
        unset($form['profile_image']);
        
        // データベースに保存
        $profile->fill($form);
        $profile->save();    
        
        return redirect('admin/profile/create');
    }
    
    
    // 3.edit
    public function edit(Request $request)
    {
        
        
        
        return view('admin.profile.edit');
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
        
        
        return view('admin.profile.index');
    }
    
     // 7.summary(Mypage)
    public function summary(Request $request)
    {
        
        return view('admin.mypage');
    }
    
    
    
}
