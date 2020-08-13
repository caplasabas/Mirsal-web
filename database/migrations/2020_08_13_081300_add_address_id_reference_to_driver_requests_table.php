<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAddressIdReferenceToDriverRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('driver_requests', function (Blueprint $table) {
            $table->bigInteger('address_from_id')->unsigned()->nullable();
            $table->foreign('address_from_id')->references('id')->on('address')->onCascade('delete');
            $table->bigInteger('address_to_id')->unsigned()->nullable();
            $table->foreign('address_to_id')->references('id')->on('address')->onCascade('delete');
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
