<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    
    protected $guarded = array('id');
    
    //
    public static $rules = array(
        'displayname' => 'required',
        'gender' => 'required',
        'birthday' => 'required',
        'pref_code' => 'required',
        'introduction' => 'required',
        );
    
    public function user() 
   {
       return $this->hasMany('App\User');
   }
   
   
       // gender 定義
    public function getGenderString() {
        $gender;
        
        if($this->gender == 1){
            $gender = "男性";
        } else if ($this->gender == 2){
            $gender = "女性";
        } else if ($this->gender == 9){
            $gender = "その他";
        } else {
            $gender = "未回答";
        }
        
        return $gender;
    }


   
}