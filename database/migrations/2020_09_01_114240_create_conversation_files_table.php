<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConversationFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('conversation_files', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('conversation_id')->unsigned()->nullable();
            $table->foreign('conversation_id')->references('id')->on('conversations')->onCascade('delete');
            $table->string('name')->nullable();
            $table->enum('type', ['IMAGE','FILE','AUDIO','VIDEO'])->default('FILE');
            $table->bigInteger('uploader_id')->unsigned()->nullable();
            $table->foreign('uploader_id')->references('id')->on('users')->onCascade('delete');
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
        Schema::dropIfExists('conversation_files');
    }
}
