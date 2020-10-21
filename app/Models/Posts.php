<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    //
    public $timestamps = false;
	protected $table = 'db_post';
	protected $primaryKey = 'post_id';
	protected $guarded = [];
}
