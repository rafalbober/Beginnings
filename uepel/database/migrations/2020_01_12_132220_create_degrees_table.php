<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDegreesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('degrees', function (Blueprint $table) {
            $table->Increments('id');
            $table->integer('student_index')->unsigned();
            $table->integer('lesson_number')->unsigned()->nullable();
            $table->integer('subject_id')->unsigned();
            $table->float('degree')->nullable();



            $table->timestamps();
        });

        Schema::table('degrees', function (Blueprint $table) {

            $table->foreign('student_index')->references('id')->on('students');
            $table->foreign('subject_id')->references('id')->on('subjects');
            $table->foreign('lesson_number')->references('id')->on('lessons');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('degrees');
    }
}
