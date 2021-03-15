<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class actionlog extends Model
{
    protected $guarded = ['password'];
    protected $table = 'action_log';

    public function actionlogWithUsers(){
        return $this->hasOne('App\models\users','id','user');
    }
}
