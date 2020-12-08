<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    //
    protected $guarded = array('id');
    
    public static $rules = array(
      'shop_name' => 'required',
      'pref_code' => 'required',
      'city' => 'required',
      'title' => 'required',
      'body' => 'required',
    
    );
    
    public function photos()
    {
      return $this->hasMany('App\ReportPhoto');
    }
}

