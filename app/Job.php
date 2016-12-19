<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $fillable = [
        'customer_number',
        'master_id' ,
        'slave_id' ,
        'job_title' ,
        'customer_name' ,
        'place_name' ,
        'lat_start' ,
        'lng_start' ,
        'lat_end' ,
        'lng_end'
    ];
}
