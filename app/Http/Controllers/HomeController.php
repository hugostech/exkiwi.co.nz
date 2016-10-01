<?php

namespace App\Http\Controllers;

use App\Adress_rec;
use App\Category;
use App\Forecast_parkage;
use App\Http\Requests;
use App\Parkage_details;
use App\Parkage_received;
use App\Parkage_received_content;
use App\Parkage_status;
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

        $forecast = $user->forecasts;


        $services = Service::where('position',1)->where('status',1)->get();

        $categorys = self::category2array();

        $parkages = $user->parkages;

        $left_nav = 'index';

        $status = self::parkage_status();
        return view($this->lg.'.index',compact('user','forecast','left_nav','services','categorys','parkages','status'));
    }

    private function parkage_status(){
        $status = Parkage_status::where('status',1)->get();
        $result = array();
        foreach($status as $item){
            $result[$item->id]=$item->content;
        }
        return $result;
    }

    public function parkage_edit(Request $request){

        $parkage = Parkage_received::find($request->input('parkage_id'));
        $contents = $parkage->contents;
        foreach($contents as $item){
            $item->delete();
        }
        $length = count($request->input('value'))-1;
        $total = 0;

        for($i = 1; $i <= $length; $i++){
            if(empty($request->input("category")[$i]) || empty($request->input("detail")[$i])){
                continue;
            }
            $item = new Parkage_received_content();
            $item->parkage_in_id = $request->input('parkage_id');
            $item->value = $request->input("value")[$i];
            $item->content = $request->input("detail")[$i];
            $item->make = $request->input("brand")[$i];
            $item->category_id = $request->input("category")[$i];
            $item->quantity = $request->input("quantity")[$i];

            $item->save();
            $total+=$request->input("value")[$i]*$request->input("quantity")[$i];
        }
        $parkage->status = 2;
        $parkage->value = $total;
        $parkage->save();
        return redirect('/dashboard');
    }
    public function show_parkage_edit($id){
        $user = Auth::user();

        $parkage  = Parkage_received::find($id);

        if($parkage->user_id != $user->id){
            echo 'Cannot found';
            exit;
        }

        $left_nav = 'edit_parkage';


        $categorys = $categorys = self::category2array();


        $parkageContent = $parkage->contents;

        return view($this->lg.'.edit_parkage',compact('user','left_nav','parkageContent','categorys','parkage'));
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

    /*
     * show select address page*/
    public function selectAddress(Request $request){
        $user = Auth::user();
        $addresses = $user->address_rec;
        $parkage_id = json_encode($request->input('parkage_id'));
        $services = json_encode($request->input('services'));


        return view($this->lg.'.selectAddress',compact('user','addresses','parkage_id','services'));
    }


    public function selectcarrier(Request $request){
//        $couriers =
        $user = Auth::user();
        $services = $request->input('services');
        $parkages = $request->input('parkages');
        $address_id = $request->input('address_id');
        return view($this->lg.'.selectCourier',compact('user','address_id','parkages','services'));

    }

    private function courierCalculate($weight){

    }

    public function orderReview(Request $request){
//        dd($request->all());
        $address = Adress_rec::find($request->input('address_id'));
        $parkages = json_decode($request->input('parkages'),true);
        $servers = json_decode($request->input('services'),true);
        $contents = array();
        $total = 0;
        foreach($parkages as $i){
            $parkage = Parkage_received::find($i);
            $items = $parkage->contents;
            foreach($items as $item){
                $contents[] = $item;
                $total+=$item->value*$item->quantity;
            }

        }
        $total=number_format($total, 2);
        return view($this->lg.'.orderReview',compact('address','contents','total'));
    }

    public function selectService(Request $request){
        $ids = $request->batchSelect;
        $parkages = array();
        foreach($ids as $id){
            $parkage = Parkage_received::find($id);
            $parkage_contents = $parkage->contents;
            $parkages[] = compact('parkage','parkage_contents');
        }
        return self::showService($parkages);

    }

    public function selectServiceSingle($id){
        $parkage = Parkage_received::find($id);
        $parkage_contents = $parkage->contents;
        $parkages = array();
        $parkages[] = compact('parkage','parkage_contents');
        return self::showService($parkages);

    }

    private function showService($parkages){
        $services = Service::where('position',2)->where('status',1)->get();
        return view($this->lg.'.selectService',compact('parkages','services'));
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
            $item->quantity = $request->input("quantity")[$i];
//            $item->status = 'forecast';
            $item->save();
        }

        return redirect('/dashboard');

    }
    private function category2array(){
        $category = Category::all();
        $categorys = array();
        foreach($category as $item){
            $categorys[$item->id]=$item->description;
        }
        return $categorys;
    }


}
