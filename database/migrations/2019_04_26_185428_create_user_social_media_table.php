<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserSocialMediaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_social_media', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->index();
            $table->unsignedInteger('social_media_id')->index();
            $table->string('url');

            $table->primary(['user_id', 'social_media_id']);
            $table->foreign('user_id')->references('id')->on('users')
                ->onUpdate('no action')->onDelete('cascade');
            $table->foreign('social_media_id')->references('id')->on('social_media')
                ->onUpdate('no action')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_social_media');
    }
}
