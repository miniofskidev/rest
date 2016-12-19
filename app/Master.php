<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Master extends Model
{
    protected $fillable = [
        'name' ,
        'number' ,
        'fire_base'
    ];
}
