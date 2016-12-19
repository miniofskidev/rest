<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slave extends Model
{
    protected $fillable = [
        'master_id' ,
        'name' ,
        'number' ,
        'fire_base'
    ];
}
