<?php

namespace App\Http\Controllers;

use App\Adress_rec;
use App\Category;
use App\Forecast_parkage;
use App\Http\Requests;
use App\Parkage_details;
use App\Pointrecord;
use App\Rate;
use App\Service;
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

        $services = Service::where('poistion',1)->orwhere('poistion',2)->where('status',1)->get();

        $categorys = Category::all();

        $parkages = $user->parkages;

        $left_nav = 'index';
        return view($this->lg.'.index',compact('user','forecast','left_nav','services','categorys','parkages'));
    }

    public function top_up(){

        $user = Auth::user();
        $left_nav = 'top-up';

        return view($this->lg.'.topup',compact('user','left_nav'));

    }
    /*
     * show chinese address*/
    public function address_chn(){
        $user = Auth::user();
        $left_nav = 'chn_add';

        return view($this->lg.'.address_chn',compact('user','left_nav'));
    }

    /*
     * show received address*/
    public function address_rec(){
        $user = Auth::user();
        $left_nav = 'own_add';
        $addresses = $user->address_rec;
        return view($this->lg.'.address_rec',compact('user','left_nav','addresses'));
    }


    public function add_address(Request $request){
        Adress_rec::create($request->all());
        return redirect('address_rec');
    }

    public function edit_address($id,Request $request){
        $address = Adress_rec::find($id);
        $address->update($request->all());
        return redirect('address_rec');
    }

    public function del_address($id){
        Adress_rec::destroy($id);
        return redirect('address_rec');
    }

    public function top_up_process(Request $request){
        $amount = self::calculateAmount($request->input('credit'),$request->input('code'));

        if($amount>0){
            self::sendPaymentRequest();
            self::addPointRecord($request->input('credit'),'Top up');
            return redirect('dashboard');


        }else{
            return redirect('top-up');
        }
    }

    private function calculateAmount($credit,$currency_code){

        $rate = Rate::where('code',$currency_code)->first();

        if(count($rate)>0){
            $rate = $rate->rate;
        }else{
            return 0;
        }
        return round($credit/$rate,2);

    }

    private function sendPaymentRequest(){
        //do requuest
        //if successfull
        self::addTransaction();
        return true;
    }
    private function addPoint($credit){
        $user = Auth::user();
        $user->point = $user->point + $credit;
        $user->save();
    }
    private function addPointRecord($credit,$comment = ''){
        $record = new Pointrecord();
        $record->user_id = Auth::user()->id;
        $record->point = $credit;
        $record->comment = $comment;
        $record->save();
        self::addPoint($credit);
    }
    private function addTransaction(){
        return false;
    }

    public function forecast(Request $request){
        $length = count($request->input('value'))-1;
        $user = Auth::user();
        $track = $request->input('track');
        $forecast = new Forecast_parkage();
        $forecast->tracking_number = strtoupper($track);
        $forecast->user_id = $user->id;
        $forecast->value = 0;
//        dd(json_encode($request->input('service')));
        $forecast->service=json_encode($request->input('service'));
        $forecast->save();

        for($i = 1; $i <= $length; $i++){
            $item = new Parkage_details();
            $item->parkage_id = $forecast->id;
            $item->value = $request->input("value")[$i];
            $item->detail = $request->input("detail")[$i];
            $item->make = $request->input("brand")[$i];
            $item->category = $request->input("category")[$i];
//            $item->status = 'forecast';
            $item->save();
        }

        return redirect('/dashboard');

    }


}
