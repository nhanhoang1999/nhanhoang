<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'db_comments';
    protected $primarykey = 'com_id';
    protected $guarded = [];
}
