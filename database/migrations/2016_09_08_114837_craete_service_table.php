<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CraeteServiceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('credit');
            $table->string('content');
            $table->integer('status')->default(1);
            $table->integer('position');
//            postion 1:预报
//            2:发货
//            3:预报+ 发货
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('service');
    }
}
