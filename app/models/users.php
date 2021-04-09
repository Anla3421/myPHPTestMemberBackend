<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use Hash;
use Str;
use Auth;
use Exception;

class users extends Model
{
    protected $guarded = [];
    protected $hidden = ['password','api_token']; 
	protected $table = "users";

    public function accountPWupdate($request){
        if ($request->position == 'administrator'){
            $data = [
                'password' => Hash::make($request->update_password),
            ];
            users::where('id',$request->update_id)->update($data);
        }else{
            if (Auth::attempt(['id' => $request->update_id, 'password' => $request->password])){
                $data = [
                    'password' => Hash::make($request->update_password),
                ];
                users::where('id',$request->update_id)->update($data);
            }else{
                throw new Exception("Your password does not match", 400);
            }
        }

    }

    public function accountupdate($request){
        $data = [
                // 'uid' =>Str::random(5),
                // 'name' => $request->name,
                // 'password' => Hash::make($request->password),
                'gender' => $request->gender,
                'level' => $request->level,
                'position' => $request->position,
                // 'api_token'=> '',
                'remember_check' => $request->remember_check,
                'remember_token' => $request->remember_token,
                'status'=> $request->status,
                'cellphone' => $request->cellphone,
                // 'created_at' => date('Y-m-d H:i:s'),
                // 'updated_at' => date('Y-m-d H:i:s',$newtime),
        ];

        users::where('id',$request->update_id)->update($data);
    }

    public function accountcreate($request){
        $data = [
                'uid' =>Str::random(5),
                'name' => $request->name,
                'password' => Hash::make($request->password),
                'gender' =>$request->gender,
                'level' => $request->level,
                'position' => $request->position,
                // 'api_token'=> '',
                'remember_check' => $request->remember_check,
                'remember_token' => $request->remember_token,
                'status'=> $request->status,
                'cellphone' => $request->cellphone,
        ];

        users::create($data);
    }

}
