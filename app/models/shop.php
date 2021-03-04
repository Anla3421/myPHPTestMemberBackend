<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class shop extends Model
{
    protected $guarded=[];
    protected $table="shop";

    public function Updateinfo2($needtochange){
        $this->pid = $needtochange['pid'];
        $this->title=$needtochange['title'];
        $this->description=$needtochange['description'];
        $this->top=$needtochange['top'];
        $this->amount=$needtochange['amount'];
        $this->price=$needtochange['price'];
        $this->discount=$needtochange['discount'];
        $this->finalprice=$needtochange['finalprice'];
        $this->kid=$needtochange['kid'];
        $this->type=$needtochange['type'];
        $this->did=$needtochange['did'];
    }

    public function shoptoclassify(){
        return $this->hasOne('App\models\classify', 'title', 'classify'); //hasOne('App\Phone', 'foreign_key', 'local_key');
    }
    public function shoptokeyword(){
        return $this->hasOne('App\models\keyword', 'kid', 'kid');
    }
    public function shoppidtophotopid(){
        return $this->hasOne('App\models\photo', 'pid', 'pid');
    }
    public function shopidtophotoshopid(){
        return $this->hasOne('App\models\photo', 'shop_id', 'id');
    }
    public function shop_idtophoto_shop_id(){
        return $this->hasOne('App\models\photo', 'shop_id', 'id');
    }
}
