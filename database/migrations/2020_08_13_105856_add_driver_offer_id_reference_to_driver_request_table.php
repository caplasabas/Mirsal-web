<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDriverOfferIdReferenceToDriverRequestTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('driver_requests', function (Blueprint $table) {
            $table->bigInteger('driver_offer_id')->unsigned()->nullable();
            $table->foreign('driver_offer_id')->references('id')->on('driver_offers')->onCascade('delete');
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
