<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class game extends Model
{
    protected $guard=[];
    protected $table='game';

    public function gameWithGameinfo(){
        return $this->hasOne('App\models\gameinfo','info_id','info_id');
    }
    public function gameWithProvider(){
        return $this->hasOne('App\models\provider','id','provider_id');
    }
}
