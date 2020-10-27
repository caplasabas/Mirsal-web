<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDriverRequestPreferredDateAndTimeToDriverRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('driver_requests', function (Blueprint $table) {
            $table->date('preferred_date')->nullable();
            $table->string('preferred_time')->nullable();
            $table->dropColumn(['prefered_date','prefered_time']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('driver_requests', function (Blueprint $table) {
            //
        });
    }
}
