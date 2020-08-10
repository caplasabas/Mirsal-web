<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVetRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vet_requests', function (Blueprint $table) {
            $table->id();
            $table->enum('type', ['CONSULTATION','VISIT'])->default('CONSULTATION');
            $table->bigInteger('animal_id')->unsigned()->nullable();
            $table->foreign('animal_id')->references('id')->on('animals')->onCascade('delete');
            $table->bigInteger('size_id')->unsigned()->nullable();
            $table->foreign('size_id')->references('id')->on('sizes')->onCascade('delete');
            $table->bigInteger('vet_offer_id')->unsigned()->nullable();
            $table->foreign('vet_offer_id')->references('id')->on('vet_offers')->onCascade('delete');
            $table->longText('description')->nullable();

            $table->string('house_number')->nullable();
            $table->string('street')->nullable();
            $table->string('city')->nullable();
            $table->string('postal_code')->nullable();
            $table->string('loc_lat')->nullable();
            $table->string('loc_long')->nullable();
            
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
        Schema::dropIfExists('vet_requests');
    }
}
