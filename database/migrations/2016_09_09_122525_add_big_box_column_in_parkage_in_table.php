<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddBigBoxColumnInParkageInTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('parkage_in', function (Blueprint $table) {
            $table->string('big_box')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('parkage_in', function (Blueprint $table) {
            $table->dropColumn('big_box');
        });
    }
}
