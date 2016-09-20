<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Parkage_status extends Model
{
    protected $table = 'parkage_status';

    public function parkages(){
        return $this->hasMany('App\Parkage_received','status');
    }
}
