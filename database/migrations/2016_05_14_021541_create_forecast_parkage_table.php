<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateForecastParkageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('forecast_parkages', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('tracking_number')->unique();
            $table->float('value');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('forecast_parkages');
    }
}
