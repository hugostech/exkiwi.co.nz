<?php

namespace App\Http\Controllers;

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
}
