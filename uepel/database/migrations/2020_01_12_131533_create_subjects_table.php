<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subjects', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('name')->unique();
            $table->integer('teacher_id')->unique();
            $table->integer('signup_capacity');
            $table->integer('signup_current');
           // $table->integer('teacher_id')->unique();
            $table->timestamps();

            $table->foreign('teacher_id')->references('teacher_id')->on('teachers');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subjects');
    }
}
