<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMstShipPositionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mst_ship_positions', function (Blueprint $table) {
            $table->id();
            $table->integer('mmsi');
            $table->integer('status');
            $table->integer('station_id');
            $table->double('speed');
            $table->double('longitude');
            $table->double('latitude');
            $table->point('location');
            $table->integer('course');
            $table->integer('heading');
            $table->string('rot')->nullable();
            $table->timestamp('timestamp');
            $table->integer('unix_timestamp');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mst_ship_positions');
    }
}
