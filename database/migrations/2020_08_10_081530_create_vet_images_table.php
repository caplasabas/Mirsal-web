<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVetImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vet_images', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('vet_request_id')->unsigned()->nullable();
            $table->foreign('vet_request_id')->references('id')->on('vet_requests')->onCascade('delete');
            $table->string('image_name');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vet_images');
    }
}
