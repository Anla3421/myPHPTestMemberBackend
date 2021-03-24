<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use Hash;
use Str;

class users extends Model
{
    protected $guarded = [];
    protected $hidden = ['password','api_token']; 
	protected $table = "users";

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
