<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectOwnersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_owners', function (Blueprint $table) {
            $table->unsignedBigInteger('id')->primary();
            $table->text('about')->nullable();
            $table->string('company');
            $table->string('nik')->nullable();
            $table->string('relation');
            $table->timestamps();

            $table->foreign('id')->references('id')->on('users')
                ->onUpdate('no action')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('project_owners');
    }
}
