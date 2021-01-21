<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\User; //for test
use Carbon\Carbon;
use App\models\classify;
use App\models\shop;

class MallController extends Controller
{
    public function addclassify(Request $request) {
		$data = DB::table('classify')->simplePaginate(20);
		return view('mall.addclassify', ['data' => $data]);
	}

	public function classifycreate(Request $request) {
		// $a = DB::insert('insert into classify (title,created_at,updated_at) values (?,?,?)', [$request['title'],carbon::now(),carbon::now()]);
		$a=Classify::create([
			'title'=>$request->title,
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
		$data = DB::table('shop')->simplePaginate(20);
		$mergedata = classify::get();

		return view('mall.addgoods', ['data' => $data],['mergedata'=>$mergedata]);
	}

	public function goodscreate(Request $request) {
		// $a = DB::insert('insert into classify (title,created_at,updated_at) values (?,?,?)', [$request['title'],carbon::now(),carbon::now()]);
		$a=shop::create([
			'pid'=>$request->pid,
			'classify'=>$request->classify,
			'title'=>$request->title,
			'description'=>$request->description,
			'top'=>$request->top,
			'price'=>$request->price,
			'finalprice'=>$request->finalprice,
			'amount'=>$request->amount,
			'discount'=>$request->discount,
			'kid'=>$request->kid,
			'type'=>$request->type,
			'did'=>$request->did,
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

}

// DB::table('users')->where('name', $request->only('name'))->update([
//     'remember_check' => 'on',