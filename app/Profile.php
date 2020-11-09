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
}
