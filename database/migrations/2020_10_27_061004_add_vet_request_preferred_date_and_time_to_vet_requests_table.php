<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddVetRequestPreferredDateAndTimeToVetRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('vet_requests', function (Blueprint $table) {
            $table->date('preferred_date')->nullable();
            $table->string('preferred_time')->nullable();
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
