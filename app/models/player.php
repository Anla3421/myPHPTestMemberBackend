<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use ActionLog;
use Route;

class player extends Model
{
    protected $guarded = [];
	protected $table = "player";
    public $timestamps = false;
    

    public function playerupdate($request){
        $data = [
            //有ID
            'provider_id' => $request->provider_id,
            'agent_id' => $request->agent_id,
            'name' => $request->name,
            'uniq_id' => $request->uniq_id,
            'last_at' => date('Y-m-d H:i:s'),
        ];

        player::where('id',$request->update_id)->update($data);
        // ActionLog::pushAfter('player', player::where('id', $request->get('id'))->get());

        // error_reporting(0);
        // ActionLog::save(Route::getCurrentRoute()->action['parent'],0,'remark text',null,$request->get('id'));
    }
    
    public function playercreate($request){
        $data = [
            //有ID
            'provider_id' => $request->provider_id,
            'agent_id' => $request->agent_id,
            'name' => $request->name,
            'uniq_id' => $request->uniq_id,
            'last_at' => date('Y-m-d H:i:s'),
        ];

        player::create($data);
    }

    public function playerWithProvider(){
        return $this->hasOne('App\models\provider', 'id', 'provider_id');
    }
    public function playerWithProviderlist(){
        return $this->hasOne('App\models\providerlist', 'id', 'provider_id');
    }
    public function playerWithAgent(){
        return $this->hasOne('App\models\agent', 'id', 'agent_id');
    }
}