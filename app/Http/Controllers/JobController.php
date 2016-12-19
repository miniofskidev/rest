<?php

namespace App\Http\Controllers;

use App\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function create(Request $request){

        //the customer order rateq
        $customer_number = $request->input('customer_number');
        $master_id = $request->input('master_id');
        $slave_id = $request->input('slave_id');
        $job_title = $request->input('job_title');
        $customer_name = $request->input('customer_name');
        $place_name = $request->input('place_name');
        $lat_start = $request->input('lat_start');
        $lng_start = $request->input('lng_start');
        $lat_end = $request->input('lat_end');
        $lng_end = $request->input('lat_end');

        /**
         * The job id can be the number of the customer
         */

        $job = new Job([
            'customer_number' => $customer_number ,
            'master_id' => $master_id ,
            'slave_id' => $slave_id ,
            'job_title' => $job_title ,
            'customer_name' => $customer_name ,
            'place_name' => $place_name ,
            'lat_start' => $lat_start ,
            'lng_start' => $lng_start ,
            'lat_end' => $lat_end ,
            'lng_end' => $lng_end ,
        ]);

        $response = [
            'msg' => 'job created successfully'
        ];

        if ($job->save()){
            return response()->json($response, 200);
        }

    }
}
