<?php

namespace App\Http\Controllers;

use App\Master;
use App\Slave;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function createMaster(Request $request){
        $name = $request->input('name');
        $number = $request->input('number');
        $fire_base = $request->input('fire_base');

        $master = new Master([
            'name' => $name ,
            'number' => $number ,
            'fire_base' => $fire_base
        ]);

        $response = [
            'msg' => 'master creation successful' ,
            'master_id' => $number
        ];

        if ($master->save()){
            return response()->json($response ,200) ;
        }

    }

    public function createSlave(Request $request){
        $name = $request->input('name');
        $number = $request->input('number');
        $master_id = $request->input('master_id');
        $fire_base = $request->input('fire_base');

        $slave = new Slave([
            'name' => $name ,
            'number' => $number ,
            'master_id' => $master_id ,
            'fire_base' => $fire_base
        ]);

        $response = [
            'msg' => 'slave creation successful' ,
            'slave_number' => $number
        ];

        if ($slave->save()){
            return response()->json($response ,200) ;
        }

    }

    public function signSlave(){

    }

    public function signMaster(){

    }
}
