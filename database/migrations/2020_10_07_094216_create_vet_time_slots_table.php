<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVetTimeSlotsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vet_time_slots', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('vet_id')->unsigned();
            $table->foreign('vet_id')->references('id')->on('users')->onCascade('delete');
            $table->enum('type', ['CONSULTATION','VISIT'])->default('CONSULTATION');
            $table->date('available_date');
            $table->string('to');
            $table->string('from');
            $table->string('duration');
            $table->double('price', 8, 2)->default(0);
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vet_time_slots');
    }
}
