<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SellController extends Controller
{
    public function clothes(){
        return view('sell.clothes');
    }

    public function threec(){
        return view('sell.3c');
    }
    public function vehicle(){
        return view('sell.vehicle');
    }
}
