<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class game extends Model
{
    protected $guard=[];
    protected $table='game';
    protected $fillable = [
      'gid','info_id','provider_id','status'
    ];

    public function gameWithGameinfo(){
        return $this->hasOne('App\models\gameinfo','info_id','info_id');
    }
    public function gameWithProvider(){
        return $this->hasOne('App\models\provider','id','provider_id');
    }

    public function gamenewupdate($request){
        $data = [
            //有ID
            'provider_id' => $request->provider_id,
            'name' => $request->name,
            'uniq_id' => $request->uniq_id,
            'last_at' => date('Y-m-d H:i:s'),
        ];

        game::where('id',$request->update_id)->update($data);
        gameinfo::where('id',$request->update_id)->update($data);
    }
    
    public function gamenewcreate($request){
        $data = [
            //有ID
            'gid' =>$request->gid,
            'info_id'=>$request->info_id,
            'provider_id'=>$request->provider_id,
            'status'=>$request->status,

        ];

        $data2 = [
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
            
        ];

        game::create($data);
        gameinfo::create($data2);
    }
}
