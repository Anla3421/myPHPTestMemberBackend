<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class agents extends Model
{
    protected $guarded = [];
    protected $table = 'agent';

    public function agentWithProvider(){
        return $this->hasOne('App\models\provider','id','products');
    }
}
