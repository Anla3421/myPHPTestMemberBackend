<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\models\photo;

class FileController extends Controller {
	Public function upload(Request $request) {

		if ($request->isMethod('POST')) {
//            var_dump($_FILES);
			$file = $request->file('source');
//            dd($file);
			//檔案是否上傳成功
			if ($file->isValid()) {
				//獲取原檔名
				$originalName = $file->getClientOriginalName();
				//獲取檔案拓展名
				$ext = $file->getClientOriginalExtension();
				$type = $file->getClientMimeType();
				//獲取檔案臨時絕對路徑
				$realPath = $file->getRealPath();
				//自定義檔案儲存的名稱
				// $fileName = date('Y-m-d-H-i-s') . '-' . uniqid() . '.' . $ext;
				echo "<pre>";
				print_r($request->all());
				// echo "<br>";
				// print_r($file);
				// echo "<br>";
				// print_r($originalName);
				// echo "<br>";
				// print_r($ext);
				// echo "<br>";
				// print_r($type);
				// echo "<br>";
				// print_r($realPath);
				// echo "<br>";
				// print_r($fileName);
				// echo "<br>";
				// print_r(uniqid());
				$photo=photo::Create([
					'shop_id'=>"4",
					'title'=>$originalName,
					'path'=>"/userfiles/files/".$originalName,
				]);
				$bool = Storage::disk('uploads')->put($originalName, file_get_contents($realPath));

			}
		}
		return view('file.upload');
	}
// 	Public function upload2(Request $request) {

// 		if ($request->isMethod('POST')) {
// //            var_dump($_FILES);
// 			$file = $request->file('source');
// //            dd($file);
// 			//檔案是否上傳成功
// 			if ($file->isValid()) {
// 				//獲取原檔名
// 				$originalName = $file->getClientOriginalName();
// 				//獲取檔案拓展名
// 				$ext = $file->getClientOriginalExtension();
// 				$type = $file->getClientMimeType();
// 				//獲取檔案臨時絕對路徑
// 				$realPath = $file->getRealPath();
// 				//自定義檔案儲存的名稱
// 				$fileName = date('Y-m-d-H-i-s') . '-' . uniqid() . '.' . $ext;

// 				$bool = Storage::disk('uploads')->put($fileName, file_get_contents($realPath));

// 			}
// 		}
// 	}
}
