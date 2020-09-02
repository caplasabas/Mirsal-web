<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAmountsToDriverOffersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('driver_offers', function (Blueprint $table) {
            $table->double('first_payment_price', 8, 2)->default(0);
            $table->double('tax_price', 8, 2)->default(0);
            $table->double('total', 8, 2)->default(0);
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
