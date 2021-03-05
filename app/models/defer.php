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
        switch ($table) {
            case 'player':
                DB::table($table)->where('id',$request->update_id)->update([
                    //有ID
                    'provider_id'=>$request->provider_id,
                    'name'=>$request->name,
                    'uniq_id'=>$request->uniq_id,
                    'last_at'=>$request->last_at,
                ]);
                break;

            case 'player_save':
                DB::table($table)->where('gid',$request->gid)->update([
                    //沒ID
                    // 'gid'=>$request->gid,
                    'token'=>$request->token,
                    'name'=>$request->name,
                    'profile'=>$request->profile,
                    'value'=>$request->value,
                    'updated_at'=>$request->updated_at,
                ]);
                break;

            case 'game':
                DB::table($table)->where('id',$request->update_id)->update([
                    //有ID
                    'gid' =>$request->gid,
                    'info_id'=>$request->info_id,
                    'provider_id'=>$request->provider_id,
                    'status'=>$request->status,
                    'created_at' => $request->created_at,
                    'updated_at' => $request->updated_at,
                ]);
                break;

            case 'game_info':
                DB::table($table)->where('info_id',$request->info_id)->update([
                    //沒ID
                    // 'info_id'=>$request->info_id,
                    'name' =>$request->name,
                    'name_cn' =>$request->name_cn,
                    'name_en' =>$request->name_en,
                    'name_jp' =>$request->name_jp,
                    'server_host'=>$request->server_host,
                    'server_path'=>$request->server_path,
                    'server_port'=>$request->server_port,
                    'server_demo_port'=>$request->server_demo_port,
                    'client_dir_name'=>$request->client_dir_name,
                    'created_at' => $request->created_at,
                    'updated_at' => $request->updated_at,
                ]);
                break;

            case 'provider':
                DB::table($table)->where('id',$request->update_id)->update([
                    //有ID
                    'username'=>$request->username,
                    'private_key'=>$request->private_key,
                    'game_url'=>$request->game_url,
                    'name'=>$request->name,
                    'enabled'=>$request->enabled,
                    'created_at' => $request->created_at,
                    'updated_at' => $request->updated_at,
                ]);
               break;
            
            case 'report':
                DB::table($table)->where('id',$request->update_id)->update([
                    //有ID
                    'token'=>$request->token,
                    'gid'=>$request->gid,
                    'in'=>$request->in,
                    'out'=>$request->out,
                    'wage'=>$request->wage,
                    'surplus'=>$request->surplus,
                    'goods'=>$request->goods,
                    'profile'=>$request->profile,
                    'created_at' =>$request->created_at,
                ]);
                break;

            case 'server_config':
                DB::table($table)->where('gid',$request->gid)->update([
                    //沒ID
                    // 'gid'=>$request->gid,
                    'name'=>$request->name,
                    'profile'=>$request->profile,
                    'value'=>$request->value,
                    // 'updated_at'=>$request->updated_at,
                ]);
                break;                                                
            
            default:
                throw new Exception("Bad Request", 400);
                break;
        }

    }

    protected function verifycreate($request,$table){
        // player::create([
        //     'provider_id'=>$request->provider_id,
        //     'name'=>$request->name,
        //     'uniq_id'=>$request->uniq_id,
        //     'created_at'=>$request->created_at,
        //     'updated_at'=>$request->updated_at,
        // ]);
        
        switch ($table) {
            case 'player':
                DB::table($table)->insert([
                    //有ID
                    'provider_id'=>$request->provider_id,
                    'name'=>$request->name,
                    'uniq_id'=>$request->uniq_id,
                    'last_at'=>$request->last_at,
                ]);
                break;
            case 'player_save':
                DB::table($table)->insert([
                    //沒ID
                    'gid'=>$request->gid,
                    'token'=>$request->token,
                    'name'=>$request->name,
                    'profile'=>$request->profile,
                    'value'=>$request->value,
                    'updated_at'=>$request->updated_at,
                ]);
                break;
            case 'game':
                DB::table($table)->insert([
                    //有ID
                    'gid' =>$request->gid,
                    'info_id'=>$request->info_id,
                    'provider_id'=>$request->provider_id,
                    'status'=>$request->status,
                    'created_at' => $request->created_at,
                    'updated_at' => $request->updated_at,
                ]);
                break;                                
            case 'game_info':
                DB::table($table)->insert([
                    //沒ID
                    'info_id'=>$request->info_id,
                    'name' =>$request->name,
                    'name_cn' =>$request->name_cn,
                    'name_en' =>$request->name_en,
                    'name_jp' =>$request->name_jp,
                    'server_host'=>$request->server_host,
                    'server_path'=>$request->server_path,
                    'server_port'=>$request->server_port,
                    'server_demo_port'=>$request->server_demo_port,
                    'client_dir_name'=>$request->client_dir_name,
                    'created_at' => $request->created_at,
                    'updated_at' => $request->updated_at,
                ]);
                break;

            case 'provider':
                DB::table($table)->insert([
                    //有ID
                    'username'=>$request->username,
                    'private_key'=>$request->private_key,
                    'game_url'=>$request->game_url,
                    'name'=>$request->name,
                    'enabled'=>$request->enabled,
                    'created_at' => $request->created_at,
                    'updated_at' => $request->updated_at,
                ]);
                break;

            case 'report':
                DB::table($table)->insert([
                    //有ID
                    'token'=>$request->token,
                    'gid'=>$request->gid,
                    'in'=>$request->in,
                    'out'=>$request->out,
                    'wage'=>$request->wage,
                    'surplus'=>$request->surplus,
                    'goods'=>$request->goods,
                    'profile'=>$request->profile,
                    'created_at' =>$request->created_at,
                ]);
                break;
            case 'server_config':
                DB::table($table)->insert([
                    //沒ID
                    'gid'=>$request->gid,
                    'name'=>$request->name,
                    'profile'=>$request->profile,
                    'value'=>$request->value,
                    'updated_at'=>$request->updated_at,
                ]);
                break;                                                
                
                
            
            default:
                throw new Exception("Bad Request", 400);
                break;
        }
    }
    //     // player
    //     DB::table($table)->insert([
    //         'provider_id'=>$request->provider_id,
    //         'name'=>$request->name,
    //         'uniq_id'=>$request->uniq_id,
    //         'last_at'=>$request->last_at,
    //     ]);
    // }

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
                'msg' => 'success',
                'request'=>$request->all(),
            ]);


        } catch (Exception $e) {
            return response()->json([
                'status' => $e->getcode(),
                'msg' => $e->getMessage(),
                'request'=>$request->all(),
                'table'=>$table,
                'true?'=>$create,
            ]);
        };
    }

}
