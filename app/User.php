<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','phone','language'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }

    public function forecasts(){
        return $this->hasMany('App\Forecast_parkage','user_id');
    }

    public function address_rec(){
        return $this->hasMany('App\Adress_rec','user_id');
    }

    public function parkages(){
        return $this->hasMany('App\Parkage_received','user_id');
    }

}
