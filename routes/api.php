<?php

use Illuminate\Http\Request;
use App\Slave;
use App\Job;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::post('/slave' ,[
   'uses' => 'UserController@createSlave'
]);

Route::post('/slave/sign_in',[
   'uses' => 'UserController@signSlave'
]);

Route::post('/master' ,[
   'uses' => 'UserController@createMaster'
]);

Route::post('/master/sign_in' ,[
   'uses' => 'UserController@signMaster'
]);

Route::post('/job' , [
   'uses' => 'JobController@create'
]);

/** Slaves use this to send their current position to the master and the data will be pushed to the master*/
Route::post('/location' ,[
   'uses' => 'LocationDataController@create'
]);


Route::get('/location/{slave_id}' , function ($slave_id){

});

/** For getting the list of jobs of a slave*/
Route::get('/job/{slave_id}' , function($slave_id){

    $jobs = Job::where('slave_id' , $slave_id)->get();

    foreach ($jobs as $job){
        return response()->json($job);
    }

});

/**  For taking a single job of a slave with @slave_id & @job_id*/
Route::get('/job/{slave_id}/{customer_number}' ,function ($slave_id ,$customer_number){

    $job = Job::where('slave_id' , $slave_id)->where('customer_number' ,$customer_number)->first();

    return response()->json($job);

});

/** For taking the slaves of a master by @master_id */
Route::get('slave/{master_id}' ,function($master_id){

    $slaves = Slave::where('master_id',$master_id)->get();

    foreach ($slaves as $slave){
        return response()->json($slave);
    }
});