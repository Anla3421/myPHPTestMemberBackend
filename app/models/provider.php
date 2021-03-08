<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class provider extends Model
{
    protected $guard=[];
    protected $table='provider';

    public function providerWithGame(){
        return $this->belongsTo('App\models\game','provider_id','id');
    }
    public function providerWithCurrency(){
        return $this->hasOne('App\models\currencyinitial','cid','currency');
    }
}