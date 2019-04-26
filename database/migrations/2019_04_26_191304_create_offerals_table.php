<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOfferalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offerals', function (Blueprint $table) {
            $table->unsignedBigInteger('student_id')->index();
            $table->unsignedBigInteger('project_id')->index();
            $table->tinyInteger('status')->default(1);
            $table->timestamps();

            $table->primary(['student_id', 'project_id']);
            $table->foreign('student_id')->references('id')->on('students')
                ->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('project_id')->references('id')->on('projects')
                ->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('offerals');
    }
}
