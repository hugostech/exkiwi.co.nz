<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Parkage_received_content extends Model
{
    protected $table = 'parkage_in_detail';

    public function parkage(){
        return $this->belongsTo('App\Parkage_received','parkage_in_id');
    }
}
