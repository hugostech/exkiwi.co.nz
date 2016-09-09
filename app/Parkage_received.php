<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Parkage_received extends Model
{
    protected $table = 'parkage_in';
    public function storages(){
        return $this->hasMany('App\storage','parkage_in_id');
    }
    public function owner(){
        return $this->belongsTo('App\User','user_id');
    }
}
