<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParkageInTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parkage_in', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();

            $table->integer('user_id');
            $table->string('track_number');
            $table->integer('status')->default(1);
            $table->float('value')->nullable();
            $table->string('service')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('parkage_in');
    }
}
