<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\photo;
use App\models\shop;

class ShopController extends Controller
{
    public function Index(Request $request) {

		return view('shop.newaddgoods');
	}
	public function fullgoods(Request $request) {
		$photo = photo::Paginate(20);
		$shop=shop::simplepaginate();
		// echo "<pre>";
		// print_r($data);
		return view('shop.goodstemplate', ['data' => $photo],['shop'=>$shop]);

}
}
