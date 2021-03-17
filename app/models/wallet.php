<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class wallet extends Model
{
    protected $guarded = [];
    protected $table = 'wallet';

    public function walletcreate($request){
        $data = [
            //有ID
            'provider_id' => $request->provider_id,
            'agent_id' => $request->agent_id,
            'name' => $request->name,
            'uniq_id' => $request->uniq_id,
            'amount' => $request->amount,
            'last_at' => date('Y-m-d H:i:s'),
        ];

        player::create($data);
    }
    
}
