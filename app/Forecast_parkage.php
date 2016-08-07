<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Forecast_parkage extends Model
{
    protected $table = 'forecast_parkages';

    public function items(){
        return $this->hasMany('App\Parkage_details','parkage_id');
    }

    public function owner(){
        return $this->belongsTo('App\User','user_id');
    }
}
