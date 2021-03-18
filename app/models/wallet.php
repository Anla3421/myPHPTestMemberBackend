<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class wallet extends Model
{
    protected $guarded = [];
    protected $table = 'wallet';

    public function walletupdate($request){
        
        // $data=[
        //     // table report 有ID
        //     // 'token' => $request->token,
        //     // 'gid' => $request->gid,
        //     // 'in' => $request->in,
        //     // 'out' => $request->out,
        //     // 'wage' => $request->wage,
        //     'surplus' => $request->surplus,
        //     // 'goods' => $request->goods,
        //     'profile' => $request->profile,
        // ];

        // report::where('token',$request->uniq_id)->update($data);
        
        // table player 有ID
        $data=[
            // 'provider_id' => $request->provider_id,
            // 'agent_id' => $request->agent_id,
            // 'name' => $request->name,
            // 'uniq_id' => $request->uniq_id,
            'currency' => $request->currency,
            'amount' => $request->amount,
            'last_at' => date('Y-m-d H:i:s'),
        ];
        player::where('id',$request->update_id)->update($data);


    }

    public function walletcreate($request){
        $data = [
            //有ID
            'provider_id' => $request->provider_id,
            'agent_id' => $request->agent_id,
            'name' => $request->name,
            'uniq_id' => $request->uniq_id,
            'currency' => $request->currency,
            'amount' => $request->amount,
            'last_at' => date('Y-m-d H:i:s'),
        ];

        player::create($data);
    }
    
}
