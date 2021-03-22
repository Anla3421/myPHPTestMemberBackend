<?php

namespace App\tools;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\models\users;
use App\models\player;
use App\models\game;
use App\models\playersave;
use App\models\provider;
use App\models\agent;
use App\models\report;
use App\models\wallet;
use App\models\serverconfig;
use Exception;
use DB;
use ActionLog;

class defer extends Model
{
    protected function verifyupdate($request,$table){
    // ActionLog::pushBefore('player', player::where('id', $request->get('id'))->get());


        switch ($table) {
            case 'player':
                $player = new player;
                $player -> playerupdate($request);
                break;

            case 'player_save':
                $playersave = new playersave;
                $playersave -> playersaveupdate($request);
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
                // DB::table($table)->where('info_id',$request->info_id)->update([
                //     //沒ID
                //     // 'info_id'=>$request->info_id,
                //     'name' =>$request->name,
                //     'name_cn' =>$request->name_cn,
                //     'name_en' =>$request->name_en,
                //     'name_jp' =>$request->name_jp,
                //     'server_host'=>$request->server_host,
                //     'server_path'=>$request->server_path,
                //     'server_port'=>$request->server_port,
                //     'server_demo_port'=>$request->server_demo_port,
                //     'client_dir_name'=>$request->client_dir_name,
                //     'created_at' => $request->created_at,
                //     'updated_at' => $request->updated_at,
                // ]);
                $gameinfo = new gameinfo;
                $gameinfo -> gameinfoupdate($request);
                break;

            case 'provider':
                $provider = new provider;
                $provider -> providerupdate($request);
                break;
            
            case 'report':
                // DB::table($table)->where('id',$request->update_id)->update([
                //     //有ID
                //     'token'=>$request->token,
                //     'gid'=>$request->gid,
                //     'in'=>$request->in,
                //     'out'=>$request->out,
                //     'wage'=>$request->wage,
                //     'surplus'=>$request->surplus,
                //     'goods'=>$request->goods,
                //     'profile'=>$request->profile,
                //     'created_at' =>$request->created_at,
                // ]);
                $report = new report;
                $report -> reportupdate($request);
                break;

            case 'server_config':
                // DB::table($table)->where('gid',$request->gid)->update([
                //     //沒ID
                //     // 'gid'=>$request->gid,
                //     'name'=>$request->name,
                //     'profile'=>$request->profile,
                //     'value'=>$request->value,
                //     'updated_at'=>date('Y-m-d H:i:s'),
                // ]);
                $serverconfig = new serverconfig;
                $serverconfig -> serverconfigupdate($request);
                break;

            case 'gamenew':
                $gamenew = new game;
                $gamenew -> gamenewupdate($request);
                break;
                
            case 'agent':
                $agent = new agent;
                $agent -> agentupdate($request);
                break;
            
            case 'reportcombine':
                $reportcombine = new report;
                $reportcombine -> reportcombineupdate($request);
                break;
            
            case 'wallet':
                $wallet = new wallet;
                $wallet -> walletupdate($request);
                break;
            
            case 'account':
                $wallet = new wallet;
                $wallet -> walletupdate($request);
                break;
            
            default:
                throw new Exception("Bad Request", 400);
                break;
        }
// ActionLog::pushAfter('system_permission', system_permission::where('member_id', $request->get('id'))->get());

// ActionLog::save(Route::getCurrentRoute()->action['parent'],0,'remark text',null,$request->get('id'));
    }

    protected function verifycreate($request,$table){   
        switch ($table) {
            case 'player':
                // DB::table($table)->insert([
                //     //有ID
                //     'provider_id'=>$request->provider_id,
                //     'name'=>$request->name,
                //     'uniq_id'=>$request->uniq_id,
                //     'last_at'=>$request->last_at,
                // ]);
                $player = new player;
                $player -> playercreate($request);
                break;

            case 'player_save':
                // DB::table($table)->insert([
                //     //沒ID
                //     'gid'=>$request->gid,
                //     'token'=>$request->token,
                //     'name'=>$request->name,
                //     'profile'=>$request->profile,
                //     'value'=>$request->value,
                //     'updated_at'=>$request->updated_at,
                // ]);
                $playersave = new playersave;
                $playersave -> playersavecreate($request);
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
                // DB::table($table)->insert([
                //     //沒ID
                //     // 'info_id'=>$request->info_id,
                //     'name' =>$request->name,
                //     'name_cn' =>$request->name_cn,
                //     'name_en' =>$request->name_en,
                //     'name_jp' =>$request->name_jp,
                //     'server_host'=>$request->server_host,
                //     'server_path'=>$request->server_path,
                //     'server_port'=>$request->server_port,
                //     'server_demo_port'=>$request->server_demo_port,
                //     'client_dir_name'=>$request->client_dir_name,
                //     'created_at' => $request->created_at,
                //     'updated_at' => $request->updated_at,
                // ]);
                $gameinfo = new gameinfo;
                $gameinfo -> gameinfocreate($request);
                break;

            case 'provider':
                // DB::table($table)->insert([
                //     //有ID
                //     'username'=>$request->username,
                //     'private_key'=>$request->private_key,
                //     'game_url'=>$request->game_url,
                //     'name'=>$request->name,
                //     'currency'=>$request->currency,
                //     'enabled'=>$request->enabled,
                //     'created_at' => $request->created_at,
                //     'updated_at' => $request->updated_at,
                // ]);
                $provider = new provider;
                $provider -> providercreate($request);
                break;

            case 'report':
                // DB::table($table)->insert([
                //     //有ID
                //     'token'=>$request->token,
                //     'gid'=>$request->gid,
                //     'in'=>$request->in,
                //     'out'=>$request->out,
                //     'wage'=>$request->wage,
                //     'surplus'=>$request->surplus,
                //     'goods'=>$request->goods,
                //     'profile'=>$request->profile,
                //     'created_at' =>$request->created_at,
                // ]);
                $report = new report;
                $report -> reportcreate($request);
                break;
            case 'server_config':
                // DB::table($table)->insert([
                //     //沒ID
                //     'gid'=>$request->gid,
                //     'name'=>$request->name,
                //     'profile'=>$request->profile,
                //     'value'=>$request->value,
                //     'updated_at'=>date('Y-m-d H:i:s'),
                // ]);
                $serverconfig = new serverconfig;
                $serverconfig -> serverconfigcreate($request);
                break;
                
            case 'gamenew':
                $gamenew = new game;
                $gamenew -> gamenewcreate($request);
                break;  
            
            case 'agent':
                $agent = new agent;
                $agent -> agentcreate($request);
                break;  
            
            case 'reportcombine':
                $reportcombine = new report;
                $reportcombine -> reportcombinecreate($request);
                break;

            case 'wallet':
                $wallet = new wallet;
                $wallet -> walletcreate($request);
                break;
            
            case 'account':
                $account = new users;
                $account -> accountcreate($request);
                break;

            default:
                throw new Exception("Bad Request", 400);
                break;
        }
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
                // if(!$request->has('update_id') && !$request->has('info_id') && !$request->has('gid')){
                // throw new Exception("Forbidden!", 403);
                // }
                $this->verifyupdate($request,$table);
            }

            return response()->json([
                'status' => 200,
                'msg' => 'success',
                'request'=>$request->all(),

            ]);


        } catch (Exception $e) {
            // if (strpos($e->getMessage(),'SQLSTATE') !== false){
            //     return response()->json([
            //         'status' => 400,
            //         'msg' => "Bad Request!!!",
            //     ]);
            // }
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
