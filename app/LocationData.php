<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LocationData extends Model
{
    protected $fillable = [
        'slave_id' ,
        'master_fire_base' ,
        'customer_number' ,
        //'time' ,
        'place_name' ,
        'lat' ,
        'lng'
    ];
}
