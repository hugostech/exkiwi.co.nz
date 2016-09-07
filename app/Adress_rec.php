<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Adress_rec extends Model
{
    protected $table = 'address_rec';
    protected $fillable = array(
        'locality','route','administrative_area_level_1','postal_code','country','street_number','user_id','name','phone'
    );

    public function user(){
        return $this->belongsTo('App\User','user_id');
    }
}
