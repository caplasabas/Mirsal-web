<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddVetOfferIdReferenceToVetRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('vet_requests', function (Blueprint $table) {
            $table->bigInteger('vet_offer_id')->unsigned()->nullable();
            $table->foreign('vet_offer_id')->references('id')->on('vet_offers')->onCascade('delete');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('vet_requests', function (Blueprint $table) {
            //
        });
    }
}
