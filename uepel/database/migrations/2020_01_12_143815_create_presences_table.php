<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePresencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('presences', function (Blueprint $table) {
            $table->Increments('id');
            $table->integer('student_index')->unsigned();
            $table->integer('class_number')->unsigned();
            $table->integer('subject_id')->unsigned();
            $table->boolean('confirm');


            $table->timestamps();
        });

        Schema::table('presences', function(Blueprint $table) {
            $table->foreign('student_index')->references('id')->on('students');
            $table->foreign('subject_id')->references('id')->on('subjects');
            $table->foreign('class_number')->references('id')->on('subject_clas');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('presences');
    }
}
