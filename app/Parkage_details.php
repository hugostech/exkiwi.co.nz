<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Parkage_details extends Model
{
    protected $table = 'parkage_details';

    public function parkage(){
        return $this->belongsTo('App\Forecast_parkage','parkage_id');
    }

}
