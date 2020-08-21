<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('seller_id')->unsigned()->nullable();
            $table->foreign('seller_id')->references('id')->on('users')->onCascade('delete');
            $table->enum('status', ['PENDING','SOLD','CANCELLED'])->default('PENDING');
            $table->string('title')->nullable();
            $table->enum('type', ['ANIMAL','PRODUCT'])->default('ANIMAL');
            $table->integer('is_vip')->default(0);
            $table->longText('description')->nullable;
            $table->bigInteger('duration_id')->unsigned()->nullable();
            $table->foreign('duration_id')->references('id')->on('durations')->onCascade('delete');
            $table->double('price', 8, 2)->default(0);
            $table->bigInteger('image_id')->unsigned()->nullable();
            $table->foreign('image_id')->references('id')->on('image_files')->onCascade('delete');

            $table->string('contact_phone')->nullable();
            $table->string('contact_email')->nullable();
            $table->string('iban')->nullable();
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
        Schema::dropIfExists('products');
    }
}
