<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubjectClasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subject_clas', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('title');
            $table->string('subject_name')->unique();
            $table->text('description');
            $table->integer('number')->unique();
            $table->foreign('subject_name')->references('name')->on('subjects');
            $table->timestamps();


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subject_clas');
    }
}
