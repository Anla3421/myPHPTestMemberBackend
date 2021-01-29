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
	public function updategoodsfull2(Request $request) {
		$goodsupdate = shop::find($request->id);
		$goodsupdate->updateinfo2([
			// 'pid' => $request['pid'],
			'pid' => 1,
			'title' => $request['title'],
			'description' => $request['description'],
			// 'top' => $request['top'],
			'top' => 1,
			'amount' => $request['amount'],
			'price' => $request['price'],
			// 'discount' => $request['discount'],
			'discount' => $request['finalprice'] / $request['price'] * 100,
			'finalprice' => $request['finalprice'],
			'kid' => $request['kid'],
			// 'type' => $request['type'],
			'type' => 1,
			'did' => $request['did'],
		]);
		$goodsupdate->save();
		// echo "<pre>";
		// print_r($request->all());
		// print_r($goodsupdate);
		return redirect()->intended('addgoods');
	}
	public function creategoodsfull(Request $request) {
		$a = shop::create([
			'pid' => $request->pid,
			// 'classify' => $request->classify,
			'classify' => 3,
			'title' => $request->title,
			'description' => $request->description,
			// 'top' => $request->top,
			'top' => 1,
			'price' => $request->price,
			'finalprice' => $request->finalprice,
			'amount' => $request->amount,
			// 'discount' => $request->discount,
			'discount' => $request->finalprice/$request->price*100,
			'kid' => $request->kid,
			// 'type' => $request->type,
			'type' => 2,
			'did' => $request->did,
		]);
		// echo "<pre>";
		// $data=Classify::get();
		// $time=carbon::now();
		// print_r(date('Y-m-d H:i:s'));
		// print_r($time);
		// print_r($request->all());
		// return redirect()->intended('addgoods');

		return redirect()->intended('addgoods');
	}
	public function sellgoods(Request $request,$id){
		$shop=shop::find($id);
		$photo=photo::where('shop_id',$id)->get();
		// echo "<pre>";
		// print_r($photo);
		return view('shop.sellgoods',['shop'=>$shop],['photo'=>$photo]);
	}

}