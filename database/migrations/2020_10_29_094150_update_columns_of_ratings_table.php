<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateColumnsOfRatingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ratings', function (Blueprint $table) {
            $table->bigInteger('rated_user_id')->unsigned()->nullable();
            $table->foreign('rated_user_id')->references('id')->on('users')->onCascade('delete');
            $table->bigInteger('rated_by_user_id')->unsigned()->nullable();
            $table->foreign('rated_by_user_id')->references('id')->on('users')->onCascade('delete');
            $table->dropForeign('ratings_driver_id_foreign');
            $table->dropForeign('ratings_vet_id_foreign');
            $table->dropForeign('ratings_client_id_foreign');
            $table->dropColumn(['client_id','vet_id', 'driver_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ratings', function (Blueprint $table) {
            //
        });
    }
}
