<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class serverconfig extends Model
{
    protected $guarded = [];
    protected $table = 'server_config';
    public $timestamps = false;

    public function serverconfigupdate($request){
        $data=[
            //沒ID
            // 'gid'=>$request->gid,
            'name'=>$request->name,
            'profile'=>$request->profile,
            'value'=>$request->value,
            'updated_at'=>date('Y-m-d H:i:s'),
        ];
    serverconfig::where('gid',$request->gid)->update($data);
    }

    public function serverconfigcreate($request){
        $data=[
            //沒ID
            'gid'=>$request->gid,
            'name'=>$request->name,
            'profile'=>$request->profile,
            'value'=>$request->value,
            'updated_at'=>date('Y-m-d H:i:s'),
        ];
    serverconfig::create($data);
    }
}
