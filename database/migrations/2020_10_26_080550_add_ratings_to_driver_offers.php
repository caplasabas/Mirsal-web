<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRatingsToDriverOffers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('driver_offers', function (Blueprint $table) {
            $table->bigInteger('rating_id')->unsigned()->nullable();
            $table->foreign('rating_id')->references('id')->on('ratings')->onCascade('delete');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('driver_offers', function (Blueprint $table) {
            //
        });
    }
}
