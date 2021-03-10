<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class playersave extends Model
{
    protected $guarded = [];
    protected $table = 'player_save';


    public function playerupdate($request){
        $data = [
            //沒ID
            // 'gid'=>$request->gid,
            'token'=>$request->token,
            'name'=>$request->name,
            'profile'=>$request->profile,
            'value'=>$request->value,
            'updated_at'=>$request->updated_at,
        ];

        player::where('id',$request->update_id)->update($data);
    }
    
    public function playercreate($request){
        $data = [
            //沒ID
            'gid'=>$request->gid,
            'token'=>$request->token,
            'name'=>$request->name,
            'profile'=>$request->profile,
            'value'=>$request->value,
            'updated_at'=>$request->updated_at,
        ];

        player::create($data);
    }

}
