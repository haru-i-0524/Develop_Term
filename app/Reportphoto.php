<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reportphoto extends Model
{
    //
     protected $guarded = array('id');
     
     public function report()
     {
         return $this->belongsTo('App\Report');
     }
}
