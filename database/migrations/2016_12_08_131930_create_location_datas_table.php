<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLocationDatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('location_datas', function (Blueprint $table) {
            $table->string('slave_id',15);
            $table->timestamps();
            $table->string('master_fire_base');
            //$table->time('time');
            $table->string('place_name');
            $table->string('lat');
            $table->string('lng');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('location_datas');
    }
}
