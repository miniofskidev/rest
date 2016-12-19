<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->timestamps();
            $table->string('customer_number',15);
            $table->string('master_id',15);
            $table->string('slave_id',15);
            $table->string('job_title');
            $table->string('customer_name');
            $table->string('place_name');
            $table->string('lat_start');
            $table->string('lng_start');
            $table->string('lat_end');
            $table->string('lng_end');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jobs');
    }
}
