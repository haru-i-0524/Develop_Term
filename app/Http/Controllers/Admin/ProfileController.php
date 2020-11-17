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
        $user_id = Auth::id();
        
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
        
        // $proifileのデータにuser_idの情報を追加。fill(form)は入力した情報のみのため…
        $profile->user_id = $user_id;
        
        // データベースに保存
        $profile->fill($form);
        $profile->save();    
        
        return redirect('admin/mypage');
    }
    
    
    // 3.edit
    public function edit(Request $request)
    {
        $profile = Profile::find($request->id);
        
        $prefecture = Prefecture::where('code', $profile->pref_code)->first();
        
        $prefectures = Prefecture::all();
        
        return view('admin.profile.edit', [ 'profile_form' => $profile, 'prefecture' => $prefecture, 'prefectures' => $prefectures]);
    }
    
    // 4.update
    public function update(Request $request)
    {
        
        // ログインしているユーザーIDを取得
        $user_id = Auth::id();
        
        // Varidationを行う
        $this->validate($request, Profile::$rules);
        // Profile Modelから該当するuser_idのデータを取得
        
        $profile = Profile::find($request->id); 
        
        // 送信されてきたフォームデータを格納する
        $profile_form = $request->all();
        
        // prefectureについての条件分岐
        if ($request->pref_code) {
            $profile_form['pref_code'] = $request->pref_code;
        } else {
            $profile_form['pref_code'] = $prefecture->code;
        }
        
        // profile_imageについての条件分岐
        if ($request->remove == 'true') {
            $profile_form['image_path'] = null;
        } elseif ($request->file('profile_image')) {
            $path = $request->file('profile_image')->store('public/img/profile');
            $profile_form['image_path'] = basename($path);
        } else {
            $profile_form['image_path'] = $profile->image_path;
        }
        
        // フォームから送信されてきた情報を削除
        // profile_image　削除
        unset($profile_form['profile_image']);
        // remove　削除
        unset($profile_form['remove']);
        // _token　削除
        unset($profile_form['_token']);
        
        $profile->fill($profile_form)->save();
        
        
        return redirect('admin/mypage?user_id='. $profile->user_id);
    }

    // 5.delete
    public function delete(Request $request)
    {
        $profile = Profile::find($request->user_id);
        
        return redirect('admin/profile/');
    }
    
    // 6.index (Mypage)
    public function index(Request $request)
    {
    
        
        
        return view('admin.profile.index', ['profile' => $profile]);
    }
    
     // 7.summary(Mypage)
    public function summary(Request $request)
    {
        // ログインしているユーザーIDを取得
        $user_id = Auth::id();
        // Profilesからuser_idを検索
        $profile = Profile::find($request->user_id);
        
        // Prefectureモデルから該当するcodeの情報を取得
        $prefecture = Prefecture::where('code', $profile->pref_code)->first();
            
        return view('admin.mypage', ['prefecture' => $prefecture, 'profile' => $profile]);
        
    }
    
    
    
    
}
