<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class gameinfo extends Model
{
    protected $guard=[];
    protected $table='game_info';
    protected $fillable = [
        'gid','info_id','provider_id','status',
        'name','name_cn','name_en','name_jp','server_host','server_path',
        'server_port','server_demo_port','client_dir_name',
      ];
}
