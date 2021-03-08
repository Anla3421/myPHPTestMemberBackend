<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class player extends Model
{
    protected $guarded = [];
	protected $table = "player";
    public $timestamps = false;
    

    public function playerupdate($request){
        $data = [
            //有ID
            'provider_id' => $request->provider_id,
            'name' => $request->name,
            'uniq_id' => $request->uniq_id,
            'last_at' => date('Y-m-d H:i:s'),
        ];

        player::where('id',$request->update_id)->update($data);
    }
    
    public function playercreate($request){
        $data = [
            //有ID
            'provider_id' => $request->provider_id,
            'name' => $request->name,
            'uniq_id' => $request->uniq_id,
            'last_at' => date('Y-m-d H:i:s'),
        ];

        player::create($data);
    }

    public function playerWithProvider(){
        return $this->hasOne('App\models\provider', 'id', 'provider_id');
        
    }
    public function playerWithAgent(){
        return $this->hasOne('App\models\agent', 'id', 'agent_id');
    }
}