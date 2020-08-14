<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientOffersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client_offers', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('seller_id')->unsigned()->nullable();
            $table->foreign('seller_id')->references('id')->on('users')->onCascade('delete');
            $table->enum('status', ['PENDING','COMPLETED'])->default('PENDING');
            $table->enum('payment_status', ['PENDING','PAID'])->default('PENDING');
            $table->string('title')->nullable();
            $table->enum('type', ['Animal','Product'])->default('Animal');
            $table->integer('is_vip')->default(0);
            $table->longText('description')->nullable;
            $table->bigInteger('duration_id')->unsigned()->nullable();
            $table->foreign('duration_id')->references('id')->on('durations')->onCascade('delete');
            $table->double('price', 8, 2)->default(0);
            $table->bigInteger('image_id')->unsigned()->nullable();
            $table->foreign('image_id')->references('id')->on('image_files')->onCascade('delete');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
            $table->string('contact_phone')->nullable();
            $table->string('contact_email')->nullable();
            $table->string('iban')->nullable();
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
        Schema::dropIfExists('client_offers');
    }
}
