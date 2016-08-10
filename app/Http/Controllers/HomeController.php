<?php

namespace App\Http\Controllers;

use App\Forecast_parkage;
use App\Http\Requests;
use App\Parkage_details;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    private $lg;
    public function __construct()
    {
        $this->middleware('auth');
        $this->lg = 'en';
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();

        $forecast = $user->forecasts->where('status','warehouse');


        return view($this->lg.'.index',compact('user','forecast'));
    }

    public function top_up(){

        $user = Auth::user();


        return view($this->lg.'.topup',compact('user'));

    }

    public function forecast(Request $request){
        $length = count($request->input('value'))-1;
        $user = Auth::user();
        $track = $request->input('track');
        $forecast = new Forecast_parkage();
        $forecast->tracking_number = $track;
        $forecast->user_id = $user->id;
        $forecast->value = 0;
        $forecast->save();

        for($i = 1; $i <= $length; $i++){
            $item = new Parkage_details();
            $item->parkage_id = $forecast->id;
            $item->value = $request->input("value")[$i];
            $item->detail = $request->input("detail")[$i];
            $item->make = $request->input("brand")[$i];
            $item->category = $request->input("category")[$i];
            $item->status = 'forecast';
            $item->save();
        }

        return redirect('/dashboard');

    }


}
