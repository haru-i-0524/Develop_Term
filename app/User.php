<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    //socialite
    function IdentityProviders()
    {
        // IdentityProviderモデルと紐づける　1対多の関係
        return $this->hasMany(IdetityProvider::class);
    }
    
    
    // gender 定義
    public function getGenderStirng() {
        $gender;
        if($this->gender == 1){
            $gender = "male";
        } else if ($this->gender == 2){
            $gender = "female";
        } else if ($this->gender == 9){
            $gender = "other";
        } else {
            $gender = "unanswered";
        }
        
        return $gender;
    }
   
   public function profile() 
   {
       return $this->hasOne('App\Profile');
   }

    public function reports() 
    {
        return $this->hasMany('App\Report');
        
    }
    
}
