<?php

namespace App\Http\Controllers;

use App\models\classify;
use App\models\keyword;
use App\models\photo; //for test
use App\models\shop;
use DB;
use Illuminate\Http\Request;

class MallController extends Controller {
	public function addclassify(Request $request) {
		$data = DB::table('classify')->simplePaginate(20);
		return view('mall.addclassify', ['data' => $data]);
	}

	public function classifycreate(Request $request) {
		// $a = DB::insert('insert into classify (title,created_at,updated_at) values (?,?,?)', [$request['title'],carbon::now()
		$a = Classify::create([
			'title' => $request->title,
		]);
		// echo "<pre>";
		// $data=Classify::get();
		// $time=carbon::now();
		// print_r(date('Y-m-d H:i:s'));
		// print_r($time);
		// print_r($request->all());
		return redirect()->intended('addclassify');

		// return response()->json([
		// 	'status' => 200,
		// 	'msg' => 'create success',
		// ]);
	}

	public function addgoods(Request $request) {
		// $data = DB::table('shop')->simplePaginate(20);
		$data = shop::Paginate(20);
		$mergedata = classify::get();

		return view('mall.addgoods', ['data' => $data], ['mergedata' => $mergedata]);
	}

	public function goodscreate(Request $request) {
		// $a = DB::insert('insert into classify (title,created_at,updated_at) values (?,?,?)', [$request['title'],carbon::now()
		$a = shop::create([
			'pid' => $request->pid,
			'classify' => $request->classify,
			'title' => $request->title,
			'description' => $request->description,
			'top' => $request->top,
			'price' => $request->price,
			'finalprice' => $request->finalprice,
			'amount' => $request->amount,
			'discount' => $request->discount,
			'kid' => $request->kid,
			'type' => $request->type,
			'did' => $request->did,
		]);
		// echo "<pre>";
		// $data=Classify::get();
		// $time=carbon::now();
		// print_r(date('Y-m-d H:i:s'));
		// print_r($time);
		// print_r($request->all());
		// return redirect()->intended('addgoods');

		return response()->json([
			'status' => 200,
			'msg' => 'create success',
		]);
	}

	public function goodsdelete(Request $request, $id) {
		$goodsdel = shop::find($id);
		$goodsdel->delete();
		return response()->json([
			'status' => 200,
			'msg' => 'create success',
		]);
	}

	public function goodsrelease(Request $request, $id) {
		$goodsrel = shop::find($id);
		// $goods->release
		// 		echo "<pre>";
		// print_r($goods->release);
		if ($goodsrel->release == 0) {
			$goodsrel->release = 1;
			$goodsrel->save();
		} else {
			$goodsrel->release = 0;
			$goodsrel->save();
		}
		return response()->json([
			'status' => 200,
			'msg' => 'create success',
		]);
	}

	public function goodsupdate(Request $request, $id) {
		$goodsupdate = shop::find($id);
		$goodsupdate->updateinfo2([
			'pid' => $request['pid'],
			'title' => $request['title'],
			'description' => $request['description'],
			'top' => $request['top'],
			'amount' => $request['amount'],
			'price' => $request['price'],
			'discount' => $request['discount'],
			'finalprice' => $request['finalprice'],
			'kid' => $request['kid'],
			'type' => $request['type'],
			'did' => $request['did'],
		]);
		$goodsupdate->save();
		// echo "<pre>";
		// print_r($request['description'] . "old<br>");
		// print_r($goodsupdate->description . "new");
		// print_r($goodsupdate);
		return response()->json([
			'status' => 200,
			'msg' => 'create success',
		]);
	}

	public function addkeyword(Request $request) {
		$data = DB::table('keyword')->simplePaginate(20);
		return view('mall.addkeyword', ['data' => $data]);
	}

	public function keywordcreate(Request $request) {
		keyword::create([
			'title' => $request->title,
			'icon' => $request->icon,
		]);
		return redirect()->intended('addkeyword');
	}

	public function addphoto(Request $request) {
		$data = photo::Paginate(20);
		return view('mall.addphoto', ['data' => $data]);
	}

	public function photocreate(Request $request) {
		photo::create([
			'shop_id' => $request->shop_id,
			'title' => $request->title,
			'path' => $request->path,
		]);
		return redirect()->intended('addphoto');
	}

	/**
	 * //關聯測試
	 */
	// public function test(){
	// 	$shop=shop::get();
	// 	$classify=classify::get();
	// 	foreach ($shop as $value){
	// 		echo "<pre>";
	// 		print_r($value->shoptoclassify->title);
	// 	}

	// 	$a=shop::find(1)->shoptoclassify->title;
	// 	echo "<pre>";
	// 	print_r($a);
	// }
}

// DB::table('users')->where('name', $request->only('name'))->update([
//     'remember_check' => 'on',