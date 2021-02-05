<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\classify;
use App\models\shop;
use App\models\photo;


class SellController extends Controller
{
    public function clothes(){
        $classify=classify::where('title','衣服')->first();
        $shop=shop::where('classify',$classify->title)->where('release','1')->get();
        
        // $shop=shop::get();
        // foreach ($shop as $key) {
        // $photo=photo::where('title',$key->title.'1')->get();
        // echo "<pre>";
        // print_r($key->title.'1');
        // print_r($shop);
        // }

        // foreach ($shop as $key => $value) {
    	// 	echo "<pre>";
		// 	print_r($value->shop_idtophoto_shop_id->path);
        // }
        return view('sell.clothes',['shop'=>$shop]);
    }

    public function threec(){
        $classify=classify::where('title','3C')->first();
        $shop=shop::where('classify',$classify->title)->where('release','1')->get();
        return view('sell.3c',['shop'=>$shop]);
    }
    public function vehicle(){
        $classify=classify::where('title','汽車')->first();
        $shop=shop::where('classify',$classify->title)->where('release','1')->get();
        return view('sell.vehicle',['shop'=>$shop]);
    }
}
