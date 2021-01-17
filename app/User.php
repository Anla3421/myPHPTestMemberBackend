<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'account','name', 'password','remember_check','remember_token','gender','cellphone', 'email'
    ];
    // public $timestamps=false;

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function Updateinfo($needtochange){
		$this->account=$needtochange['account'];
		$this->name=$needtochange['name'];
		$this->password=$needtochange['password'];
		$this->remember_check=$needtochange['remember_check'];
		$this->gender=$needtochange['gender'];
		$this->cellphone=$needtochange['cellphone'];
    }
}
