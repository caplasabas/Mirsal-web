<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddVetTimeSlotIdToVetRequests extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('vet_requests', function (Blueprint $table) {
            $table->bigInteger('vet_time_slot_id')->unsigned()->nullable();
            $table->foreign('vet_time_slot_id')->references('id')->on('vet_time_slots')->onCascade('delete');
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
        Schema::table('vet_requests', function (Blueprint $table) {
            //
        });
    }
}
