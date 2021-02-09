<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\classify;
use Faker\Generator as Faker;

$factory->define(classify::class, function (Faker $faker) {
    return [
            'title'=>'衣服',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s',$newtime),
    ];
});
