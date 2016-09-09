<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class storage extends Model
{
    protected $table = 'storage';

    public function parkage(){
        return $this->belongsTo('App\Parkage_received','parkage_in_id');
    }
}
