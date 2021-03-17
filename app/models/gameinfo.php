<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class gameinfo extends Model
{
    protected $guarded = [];
    protected $table = 'game_info';

    public function gameinfoupdate($request){
        $data=[
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
        ];
        gameinfo::where('info_id',$request->info_id)->update($data);
    }

    public function gameinfocreate($request){
        $data=[
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
        ];
        gameinfo::create($data);
    }
}
