<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class report extends Model {
	protected $guarded = [];
	protected $table = 'report';

	public function reportcombine() {
		return $this->hasOne('App\models\reportdtl', 'id', 'id'); //hasOne('App\Phone', 'foreign_key', 'local_key');
	}
	
	public function reportWithGame() {
		return $this->hasone('App\models\game', 'gid', 'gid'); 
	}

	public function reportdtl() {
		return $this->hasOne('App\models\reportdtl', 'id', 'id');
	}
	public function reportWithPlayer() {
		return $this->hasOne('App\models\player', 'uniq_id', 'token');
	}
}
