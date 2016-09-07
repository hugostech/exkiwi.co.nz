<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddressRecTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('address_rec', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('street_number');
            $table->string('name');
            $table->string('phone');
            $table->string('route');
            $table->string('locality')->nullbale();
            $table->string('administrative_area_level_1')->nullable();
            $table->string('postal_code')->nullable();
            $table->string('country');
            $table->integer('user_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('address_rec');
    }
}
