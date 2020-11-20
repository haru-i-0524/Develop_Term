<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    //
    protected $guarded = array('id');
    
    public static $rules = array(
      'shop_name' => 'required',
      'prefecture' => 'required',
      'city' => 'required',
      'title' => 'required',
      'body' => 'required',
    
    );
    
    public function photos()
    {
      return $thin->hasMany('App\Reportphoto');
    }
}

