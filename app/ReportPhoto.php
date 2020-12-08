<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReportPhoto extends Model
{
    //
    protected $guarded = array('id');
     
    public static $rules = array(
        'report_id' => 'required',
        'img_name' => 'required',
        'report_path' => 'required',
    );
     
    public function report()
    {
        return $this->belongsTo('App\Report');
    }
}
