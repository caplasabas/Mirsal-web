<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('phone')->unique();
            $table->string('password');
            $table->enum('role', ['ADMIN','VETERINARIAN','DRIVER','CLIENT'])->default('CLIENT');
            $table->string('api_token', 80)->unique()->nullable()->default(null);
            $table->string('contact_number')->nullable();
            $table->string('house_number')->nullable();
            $table->string('street')->nullable();
            $table->string('city')->nullable();
            $table->string('postal_code')->nullable();
            $table->string('loc_lat')->nullable();
            $table->string('loc_long')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('users');
    }
}
