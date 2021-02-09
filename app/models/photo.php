<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class photo extends Model
{
    protected $guarded=[];
    protected $table="photo";

    public function photo_shopidtoshop_id(){
        return $this->hasOne('App\models\photo', 'id', 'shop_id');
    }
}
