<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class agent extends Model {
	protected $guarded = [];
	protected $table = 'agent';

	public function agentWithProvider() {
		return $this->hasOne('App\models\provider', 'id', 'products');
	}

	public function agentupdate($request){
        $data = [
            //ID
			'id' => $request->update_id,
            'agent_name' => $request->agent_name,
            'products' => $request->products,
            // 'members' => $request->members,
            'remark' => $request->remark,
            'status' => $request->status,
        ];

        agent::where('id',$request->update_id)->update($data);
    }
    
    public function agentcreate($request){
        $data = [
            //有ID
            'agent_name' => $request->agent_name,
            'products' => $request->products,
            // 'members' => $request->members,
            'remark' => $request->remark,
            'status' => $request->status,
        ];

        agent::create($data);
    }
}
