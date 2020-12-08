<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;

use App\User;
use App\Prefecture;
use App\Profile;
use App\Profilehistory;
use Carbon\Carbon;
use App\Report;
use App\ReportPhoto;


class MypageController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    
    // summary(Mypage)
    public function index(Request $request)
    {
        // ログインしているユーザーIDを取得
        $user = Auth::user();
        // Profilesからuser_idを検索
        $profile = $user->profile;
        
        $prefectures = Prefecture::all();
        
        if ($profile != null) {
            // Prefectureモデルから該当するcodeの情報を取得
            $prefecture = Prefecture::where('code', $profile->pref_code)->first();
            
            return view('admin.mypage', ['profile' => $profile, 'prefecture' => $prefecture, 'reports' => $user->reports ]);
        } else {
           
            return view('admin.mypage', ['user' => $user ]);
        }
        
    }
}

