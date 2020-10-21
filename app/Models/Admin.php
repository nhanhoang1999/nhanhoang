<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'db_users';
    protected $fillable = [
        'email', 'password','name'
    ];
    public function roles(){
 		return $this->belongsToMany('App\Models\Roles');
 	}
    public function hasRole($role)
    {
      return null !== $this->roles()->where('r_name', $role)->first();
    }
}
