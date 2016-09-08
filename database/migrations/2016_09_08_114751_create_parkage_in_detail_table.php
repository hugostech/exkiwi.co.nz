<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParkageInDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parkage_in_detail', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('parkage_in_id');
            $table->integer('category_id');
            $table->string('make')->nullable();
            $table->string('content');
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
        Schema::drop('parkage_in_detail');
    }
}
