<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class provider extends Model
{
    protected $guarded = [];
    protected $table='provider';

    public function providerupdate($request){
        $data = [
            //有ID
            'username'=>$request->username,
            'private_key'=>$request->private_key,
            'game_url'=>$request->game_url,
            'name'=>$request->name,
            'currency'=>$request->currency,
            'enabled'=>$request->enabled,
        ];

        provider::where('id',$request->update_id)->update($data);
    }
    
    public function providercreate($request){
        $data = [
            //有ID
            'username'=>$request->username,
            'private_key'=>$request->private_key,
            'game_url'=>$request->game_url,
            'name'=>$request->name,
            'currency'=>$request->currency,
            'enabled'=>$request->enabled,
            // 'created_at' => $request->created_at,
            // 'updated_at' => $request->updated_at,
        ];

        provider::create($data);
    }

    public function providerWithGame(){
        return $this->belongsTo('App\models\game','provider_id','id');
    }
    public function providerWithCurrency(){
        return $this->hasOne('App\models\currencyinitial','cid','currency');
    }
    public function providerWithProviderlist(){
        return $this->hasOne('App\models\providerlist','id','name');
    }
}