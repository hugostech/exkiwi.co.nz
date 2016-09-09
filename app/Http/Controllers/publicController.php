<?php

namespace App\Http\Controllers;

use App\Forecast_parkage;
use App\Rate;
use App\Service;
use App\storage;
use App\User;
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

    public function getUserName($id){
        $user = User::find($id);
        if(isset($user->name)){
            echo $user->name;
        }else{
            echo 'Error';
        }
    }

    public function getspace($num){
        if(count(storage::all())<1){
            self::initStorage();
        }
        $space = storage::where('status',0)->take($num)->get();
        $result = array();
        foreach($space as $item){
            $result[] = array(
                'id'=>$item->id,
                'tag'=>$item->shelf.'-'.$item->level.'-'.$item->position
            );

        }
        echo json_encode($result);
    }
    private function initStorage(){
        $shelf = array('a','b','c','d','e','d');
        foreach($shelf as $single){
            for($i = 1;$i < 7; $i++){
                for($n=1;$n<15;$n++){
                    $s = new storage();
                    $s->shelf = $single;
                    $s->level = $i;
                    $s->position = $n;
                    $s->status=0;
                    $s->parkage_in_id=0;
                    $s->save();
                }
            }
        }
    }
    public function getForecast($tracking_number){
        $forecast = Forecast_parkage::where('tracking_number',strtoupper($tracking_number))->first();
        if(count($forecast)>0){
            $user = $forecast->owner;
            $serviceContent = '';
            if(!empty($forecast->service)){
                $service_Ids = json_decode($forecast->service,true);

                foreach($service_Ids as $id){
                    $service = Service::find($id);
                    $serviceContent .= $service->content;
                    $serviceContent .= ' ';
                }
            }
            $parkage = array(
                'name'=>$user->name,
                'service'=>urlencode($serviceContent)
            );
            echo urldecode(json_encode($parkage));
        }



//    dd(urlencode($serviceContent));



    }
}
