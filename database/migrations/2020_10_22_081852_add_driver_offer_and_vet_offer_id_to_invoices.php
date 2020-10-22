<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDriverOfferAndVetOfferIdToInvoices extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('invoices', function (Blueprint $table) {
            $table->dropColumn('offer_id');
            $table->bigInteger('vet_offer_id')->unsigned()->nullable();
            $table->foreign('vet_offer_id')->references('id')->on('vet_offers')->onCascade('delete');
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
        Schema::table('invoices', function (Blueprint $table) {
            //
        });
    }
}
