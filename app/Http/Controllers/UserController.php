<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use App\User;
use Hash;

class UserController extends Controller
{   
    /**
      *登入帳密之驗證
     */
	public function catch (Request $request) {
		echo "<pre>";
		    print_r($request->all());
			//  print_r($request->only('name','password'));

		$nameandpwd = $request->only('name', 'password');
		echo "<pre>";
		print_r($nameandpwd);
		if (Auth::attempt($nameandpwd)) {
			// if(array_key_exists('remember_check',$request->only('remember_check'))) //array_key_exists()
			if($request->has('remember_check')) //->has()
			{
				DB::table('users')->where('name', $request->only('name'))->update([
					'remember_check' => 'on'
					]);
			}
			$request->session()->regenerate();
			return redirect()->intended('/'); //頁面導向
		}else{
            return back()->withErrors([
            'name' => '名稱或是密碼錯誤，請確認後再次輸入。',
            ]);
		}
	}

    /**
    *搜尋頁面
    */
    public function query(Request $request){
		$data=User::paginate(20);
		$query=User::query();
		// var_dump($request->input('name')!=null);
		if(trim($request->input('name')!=null)){
			$query->where('name',$request->name);
		}
		if(trim($request->input('gender')!='all')){
			$query->where('gender',$request->gender);
		}
		if(trim($request->input('cellphone')!=null)){
			$query->where('cellphone',$request->cellphone);
		}
		$data=$query->paginate(20);
		return view('userlist',['data'=>$data]);
    
        
		// foreach ($data as $newdata) { //撈取User::paginate裡面DB所有的name
		// 	echo "<pre>";
		// print_r($newdata->name);
		// }

		// $array=$data->toarray();
		// foreach ($array['data'] as $key => $value) { //將User::paginate做成陣列後，撈取陣列裡面DB所有的name
		// 	echo "<pre>";
		// 	print_r($value['name']);
		// }

		// var_dump($arr);
		// $aa='data'->$name;
		// echo $name;
    }
    
    /**
     * CRUD:Create User (Ajax to controller(DB))
     */
    public function create(Request $request){
		User::Create([
			'account'=>$request['account'],
			'name'=>$request['name'],
			'password'=>Hash::make($request['password']),
			'gender'=>$request['gender'],
			'remember_check' =>$request['remember_check'],
            'cellphone' => $request['cellphone'],
		]);
		// echo "<pre>";
		// print_r($request->all());
		// print_r($a);
		
		return response()->json([
			'status'=>200,
			'msg'=>'create success'
		]);

	}
		
    /** 
     * CRUD:Update User
     */
    public function update(Request $request, $id){
		$user=User::find($id);
		$user->Updateinfo([
			'account'=>$request['account'],
			'name'=>$request['name'],
			'password'=>Hash::make($request['password']),
			'gender'=>$request['gender'],
			'remember_check' =>$request['remember_check'],
            'cellphone' => $request['cellphone'],
		]);
		$user->save();
		// echo "<pre>";
		// var_dump($user);
		// print_r($user['account']);
		// var_dump($user[$id]);
		return response()->json([
			'status'=>200,
			'msg'=>'update success'
		]);
    }

    /** 
     * CRUD:Delete User
     */
    public function delete(Request $request, $id){
		$user=User::find($id);
		$user->delete();
		return response()->json([
			'status'=>200,
			'msg'=>'update success'
		]);
    }
    
}
