<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class report extends Model {
	protected $guard = [];
	protected $table = 'report';

	public function reportcombine() {
		return $this->hasOne('App\models\reportdtl', 'id', 'id'); //hasOne('App\Phone', 'foreign_key', 'local_key');
	}
	public function reportcombine2() {
		return $this->hasMany('App\models\reportdtl', 'id', 'id'); //hasOne('App\Phone', 'foreign_key', 'local_key');
	}

	public function reportdtl() {
		return $this->hasOne('App\models\reportdtl', 'id', 'id');
	}

}
