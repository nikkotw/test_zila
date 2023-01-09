<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CityWeather extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('city_weather', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('temperature');
            $table->integer('wind_speed');
            $table->integer('wind_degree');
            $table->integer('humidity');
            $table->integer('cloudcover');
            $table->integer('visibility');
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
        //
    }
}
