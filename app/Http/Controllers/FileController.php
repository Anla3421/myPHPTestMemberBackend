<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileController extends Controller
{
    Public  function upload(Request $request){

        if($request->isMethod('POST')){
//            var_dump($_FILES);
            $file = $request->file('source');
//            dd($file);
            //檔案是否上傳成功
            if($file->isValid()){
                //獲取原檔名
                $originalName= $file->getClientOriginalName();
                //獲取檔案拓展名
                $ext= $file->getClientOriginalExtension();
                $type= $file->getClientMimeType();
                //獲取檔案臨時絕對路徑
                $realPath = $file->getRealPath();
                //自定義檔案儲存的名稱
                $fileName = date('Y-m-d-H-i-s').'-'.uniqid().'.'.$ext;

               $bool=  \Storage::disk('uploads')->put($fileName,file_get_contents($realPath));

               var_dump($bool);
            }
            exit;
        }
        return view('file.upload');
    }
}
