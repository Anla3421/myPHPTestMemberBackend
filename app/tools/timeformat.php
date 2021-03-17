<?php

namespace App\tools;

use Illuminate\Database\Eloquent\Model;

class timeformat extends Model
{
    public function timeformat($needtochange){
        $res = json_decode(json_encode($needtochange), true);
        foreach ($res as $key => $value) {
            $date_obj = new \DateTime($res[$key]['created_at']);
            $date_obj2 = new \DateTime($res[$key]['updated_at']);
            $res[$key]['created_at'] = $date_obj->format('Y-m-d H:i:s');
            $res[$key]['updated_at'] = $date_obj2->format('Y-m-d H:i:s');
        };
        print_r($res);
        return $res;
    }
    
}
