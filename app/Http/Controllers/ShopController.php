<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\photo;
use App\models\shop;
use Illuminate\Support\Facades\Storage;

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
		$photo=photo::where('shop_id',$shop->id)->get();
		// echo "<pre>";
		// print_r($photo);
		return view('shop.updategoodsfull',['shop'=>$shop],['photo'=>$photo]);
	}
	public function updategoodsfull2(Request $request) {
				echo "<pre>";
		print_r($request->all());
		$goodsupdate = shop::find($request->id);
		$goodsupdate->Updateinfo2([
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

		for ($i=1; $i<5 ; $i++) { 
			if ($request->input('pic'.$i) != NULL) {
				$photopathupdate=photo::where('title',$request->title.$i)->get();
				foreach ($photopathupdate as $a) {
					$a->shop_id=NULL;
					$a->title=NULL;
					$a->save();
				}
			$photopathupdate=photo::where('filename',$request->input('pic'.$i))->first();
			$photopathupdate->shop_id=$request->id;
			$photopathupdate->title=$request->title.$i;
			$photopathupdate->save();
				}
		}
		// $photopathupdate=photo::where('title',$request->title)->get();
		// 	foreach ($photopathupdate as $a) {
		// 		$a->shop_id=NULL;
		// 		$a->title=NULL;
		// 		$a->save();
		// 	}
		// 	for ($i=1; $i<5 ; $i++) { 
		// $photopathupdate=photo::where('filename',$request->input('pic'.$i))->first();
		// // $photopathupdate->updateinfo([
		// // ]);
		// $photopathupdate->shop_id=$request->id;
		// $photopathupdate->title=$request->title;
		// $photopathupdate->save();
		// 			// 'filename'=>$request->input('pic'.$i),
		// 			// 'path'=>"/userfiles/files/".$request->input('pic'.$i),
		// 	}
		return redirect()->intended('addgoods');
		}

	// for ($i=1; $i<5 ; $i++) { 
		
	// 	$insert_data=	[
	// 				'shop_id'=>$request->id,
	// 				'title'=>$request->title,
	// 				'filename'=>$request->input('pic'.$i),
	// 				'path'=>"/userfiles/files/".$request->input('pic'.$i),
	// 		];
	// 		$photo=photo::Create($insert_data);
	// 		}
	// 		print_r($insert_data);
	// 	return redirect()->intended('addgoods');
	// }
	
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

		for ($i=1; $i<5 ; $i++) { 
			if ($request->input('pic'.$i) != NULL) {
				$photopathupdate=photo::where('title',$request->title.$i)->get();
				foreach ($photopathupdate as $a) {
					$a->shop_id=NULL;
					$a->title=NULL;
					$a->save();
				}
			$photopathupdate=photo::where('filename',$request->input('pic'.$i))->first();
			$photopathupdate->shop_id=$a->id;
			$photopathupdate->title=$request->title.$i;
			$photopathupdate->save();
				}
		}
		// echo "<pre>";
		// $data=Classify::get();
		// $time=carbon::now();
		// print_r(date('Y-m-d H:i:s'));
		// print_r($time);
		// print_r($request->all());
		// return redirect()->intended('addgoods');

		return redirect()->intended('addgoods');
	}
	public function sellgoods($id){
		$shop=shop::find($id);
		// $photo=photo::where('shop_id',$id)->get();
		$photo=photo::where('shop_id',$shop->id)->get();
		// echo "<pre>";
		// print_r($shop->id);
		return view('shop.sellgoods',['shop'=>$shop],['photo'=>$photo]);
	}

}