<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class shop extends Model
{
    protected $guarded=[];
    protected $table="shop";

    public function Updateinfo2($needtochange){
        $this->pid=$needtochange['pid'];
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
}
