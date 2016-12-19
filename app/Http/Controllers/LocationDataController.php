<?php

namespace App\Http\Controllers;

use App\LocationData;
use Illuminate\Http\Request;

class LocationDataController extends Controller
{
    public function create(Request $request){
        $slave_id = $request->input('slave_id');
        $place_name = $request->input('place_name');
        $master_fire_base = $request->input('master_fire_base');
//        $time = $request->input('time');
        $lat = $request->input('lat');
        $lng = $request->input('lng');

        $response = [
            'msg' => 'the location data cached successfully' ,
            'status' => '1'
        ];

        $data = new LocationData([
            'slave_id' => $slave_id ,
            'place_name' => $place_name ,
            'master_fire_base' => $master_fire_base ,
            'lat' => $lat ,
            'lng' => $lng
        ]);

        $fields = [
            'to' => $master_fire_base,
            'data' => [
                'slave_id' => $slave_id ,
                'place_name' => $place_name ,
                'master_fire_base' => $master_fire_base ,
                'lat' => $lat ,
                'lng' => $lng
            ]
        ];

        /** initialize the curl */

        $headers = array(
            'Content-Type: application/json',
            'Authorization: key=' . 'AIzaSyCqFB6vqVkH22zr9VpIyO9mCZ5NoSfHe0M'
        );

        $url = 'https://fcm.googleapis.com/fcm/send' ;

        $ch = curl_init();

        // Set the url, number of POST vars, POST data
        curl_setopt($ch, CURLOPT_URL, $url);

        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        // Disabling SSL Certificate support temporarly
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));

        // Execute post
        $result = curl_exec($ch);
        if ($result === FALSE) {
            die('Curl failed: ' . curl_error($ch));
        }

        // Close connection
        curl_close($ch);

        if ($data->save()){
            return response()->json($response , 200);
        }
    }
}
