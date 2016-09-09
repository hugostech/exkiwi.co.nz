<?php

namespace App\Http\Controllers;

use App\Forecast_parkage;
use App\Parkage_received;
use App\storage;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\App;

class AdminController extends Controller
{
    public function package_console(){
        return view('admin.console');
    }

    public function entry_shipNo(Request $request){
//        dd($request->all());
        $courier_number = strtoupper($request->input('courier_number'));
        $user_id = $request->input('id');

        $space = $request->input('space');

        if(count(Forecast_parkage::where('tracking_number',$courier_number)->get())>0){

        }else{
            $parkage = new Parkage_received();
            $parkage->user_id = $user_id;
            $parkage->track_number = $courier_number;
            $parkage->save();

        }

        if(!$request->has('big_box')){
            foreach($space as $item){
                $s = storage::find($item);
                $s->status=1;
                $s->parkage_in_id=$parkage->id;
                $s->save();
            }
        }else{
            $parkage->big_box = $request->input('big_number');
            $parkage->save();
        }


    }
}
