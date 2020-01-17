<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_lists', function (Blueprint $table) {
            $table->Increments('id');
            $table->integer('subject_id')->unsigned();
            $table->integer('index')->unsigned();
            $table->boolean('joined');
            $table->timestamps();


        });

        Schema::table('student_lists', function (Blueprint $table) {

            $table->foreign('subject_id')->references('id')->on('subjects');
            $table->foreign('index')->references('id')->on('students');



        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('student_lists');
    }
}
