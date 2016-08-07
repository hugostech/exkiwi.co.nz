<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParkageDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parkage_details', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('category')->nullable();
            $table->string('make');
            $table->string('detail');
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
        Schema::drop('parkage_details');
    }
}
