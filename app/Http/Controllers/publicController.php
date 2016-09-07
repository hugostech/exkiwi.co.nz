<?php

namespace App\Http\Controllers;

use App\Rate;
use Illuminate\Http\Request;

use App\Http\Requests;

class publicController extends Controller
{
    private $lg;
    public function __construct()
    {
        $this->lg = 'en';
    }

    public function index(){
//        return view($this->lg.'.')
    }

    public function currency_rate($code){
        $rate = Rate::where('code',$code)->first();
        if(count($rate)>0){
            echo $rate->rate;
        }else{
            echo 1;
        }

    }
}
