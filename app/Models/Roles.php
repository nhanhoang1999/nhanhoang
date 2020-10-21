<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    public $timestamps = false; //set time to false
    protected $fillable = [
    	'r_name','r_description'
    ];
    protected $primaryKey = 'r_id';
 	protected $table = 'db_roles';

 	public function admin(){
 		return $this->belongsToMany('App\Models\Admin');
 	}    //
}
