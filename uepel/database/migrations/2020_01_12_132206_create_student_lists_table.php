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
            $table->string('subject_name');
            $table->integer('index');

            $table->timestamps();


        });

        Schema::table('student_lists', function (Blueprint $table) {

            $table->foreign('subject_name')->references('name')->on('subjects');
            $table->foreign('index')->references('index')->on('students');



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
