<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddStatusColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('forecast_parkages', function (Blueprint $table) {
            $table->enum('status',['forecast','warehouse','dispatch'])->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('forecast_parkages', function (Blueprint $table) {
            $table->dropColumn('status');
        });
    }
}
