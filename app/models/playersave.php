<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class playersave extends Model
{
    protected $guarded = [];
    protected $table = 'player_save';
    // public $timestamps = false;

    public function playersaveupdate($request){
        $data = [
            //沒ID
            // 'gid'=>$request->gid,
            // 'token'=>$request->token,
            'name'=>$request->name,
            'profile'=>$request->profile,
            'value'=>$request->value,
            // 'updated_at'=>$request->updated_at,
        ];

        playersave::where('gid',$request->gid,'token',$request->token)->update($data);
    }
    
    public function playersavecreate($request){
        $data = [
            //沒ID
            'gid'=>$request->gid,
            'token'=>$request->token,
            'name'=>$request->name,
            'profile'=>$request->profile,
            'value'=>$request->value,
            // 'updated_at'=>$request->updated_at,
        ];
    }

    public function playersaveWithGame()
    {
        return $this->hasOne('App\Models\game', 'gid', 'gid');
    }

    public function playersaveWithCurrency()
    {
        return $this->hasOne('App\Models\currencyinitial', 'cid', 'profile');
    }

}
