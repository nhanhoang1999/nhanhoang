<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $table = 'db_product';
    protected $primaryKey = 'p_id';
    protected $guarded = [];
}
