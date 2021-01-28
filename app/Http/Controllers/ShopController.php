<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\photo;
use App\models\shop;

class ShopController extends Controller
{
    public function Index(Request $request) {
		$photo = photo::Paginate(20);
		$shop=shop::simplepaginate();
		return view('shop.addgoodsfull', ['data' => $photo],['shop'=>$shop]);
	}
	public function fullgoods(Request $request) {
		$photo = photo::Paginate(20);
		$shop=shop::simplepaginate();
		// echo "<pre>";
		// print_r($data);
		return view('shop.goodstemplate', ['data' => $photo],['shop'=>$shop]);
	}
	public function updategoodsfull(Request $request,$id){
		$shop=shop::find($id);
		// echo "<pre>";
		// print_r($shop);
		return view('shop.updategoodsfull',['shop'=>$shop]);
	}

}
