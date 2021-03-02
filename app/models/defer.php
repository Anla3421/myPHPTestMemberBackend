<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Exception;
use DB;

class defer extends Model
{
    protected function verifyupdate($request,$table){
        // player::find($request->id)->update([
        //     'provider_id'=>$request->provider_id,
        //     'name'=>$request->name,
        //     'uniq_id'=>$request->uniq_id,
        //     'created_at'=>$request->created_at,
        //     'updated_at'=>$request->updated_at,
        // ]);

        //player
        DB::table($table)->where('id',$request->id)->update([
            'provider_id'=>$request->provider_id,
            'name'=>$request->name,
            'uniq_id'=>$request->uniq_id,
            'last_at'=>$request->last_at,
        ]);
    //     //player_save
    //     DB::table($table)->where('id',$request->id)->update([
    //         'gid'=>$request->gid,
    //         'token'=>$request->token,
    //         'name'=>$request->name,
    //         'profile'=>$request->profile,
    //         'value'=>$request->value,
    //         'created_at'=>$request->created_at,
    //         'updated_at'=>$request->updated_at,
    //     ]);
    //     //game
    //     DB::table($table)->where('id',$request->id)->update([
    //         'gid'=>$request->gid,
    //         'token'=>$request->token,
    //         'name'=>$request->name,
    //         'profile'=>$request->profile,
    //         'value'=>$request->value,
    //         'created_at'=>$request->created_at,
    //         'updated_at'=>$request->updated_at,
    //     ]);
    //     //game_info
    //     DB::table($table)->where('id',$request->id)->update([
    //         'gid'=>$request->gid,
    //         'token'=>$request->token,
    //         'name'=>$request->name,
    //         'profile'=>$request->profile,
    //         'value'=>$request->value,
    //         'created_at'=>$request->created_at,
    //         'updated_at'=>$request->updated_at,
    //     ]);
    //     //report
    //     DB::table($table)->where('id',$request->id)->update([
    //         'gid'=>$request->gid,
    //         'token'=>$request->token,
    //         'name'=>$request->name,
    //         'profile'=>$request->profile,
    //         'value'=>$request->value,
    //         'created_at'=>$request->created_at,
    //         'updated_at'=>$request->updated_at,
    //     ]);
    //     //serverconfig
    //     DB::table($table)->where('id',$request->id)->update([
    //         'gid'=>$request->gid,
    //         'name'=>$request->name,
    //         'profile'=>$request->profile,
    //         'value'=>$request->value,
    //         'updated_at'=>$request->updated_at,
    //     ]);
    }
    protected function verifycreate($request,$table){
        // player::create([
        //     'provider_id'=>$request->provider_id,
        //     'name'=>$request->name,
        //     'uniq_id'=>$request->uniq_id,
        //     'created_at'=>$request->created_at,
        //     'updated_at'=>$request->updated_at,
        // ]);
        
        // player
        DB::table($table)->insert([
            'provider_id'=>$request->provider_id,
            'name'=>$request->name,
            'uniq_id'=>$request->uniq_id,
            'last_at'=>$request->last_at,
        ]);
    }
    public function verifytokenandid(Request $request,$create,$table){
        try {
            if (!$request->has('api_token')) {
                throw new Exception("api_token can't be empty", 400);
            }
            if (!$request->has('id')) {
                throw new Exception("id can't be empty", 400);
            }
            $id=users::find($request->id);
            if($id->api_token == NULL){
                throw new Exception("can not find your token at db", 987);
            }
            if($id->api_token!=$request->api_token){
                throw new Exception("can not find your token at db", 999);
            }
            if(!$id->position){
                throw new Exception("Forbidden", 403);
            }
            if($id->position != 'administrator'){
                throw new Exception("Forbidden", 403);
            }

            
            if ($create){
                $this->verifycreate($request,$table);
            }else{
                $this->verifyupdate($request,$table);
            }

            return response()->json([
                'status' => 200,
                'msg' => 'success'
            ]);


        } catch (Exception $e) {
            return response()->json([
                'status' => $e->getcode(),
                'msg' => $e->getMessage(),
            ]);
        };
    }

}
