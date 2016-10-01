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

    public function status(){
        return $this->belongsTo('App\Parkage_status','status');
    }
    public function contents(){
        return $this->hasMany('App\Parkage_received_content','parkage_in_id');
    }

    public function services(){
        return $this->belongsToMany('App\Service','parkage_services','parkage_id','service_id');
    }
}
