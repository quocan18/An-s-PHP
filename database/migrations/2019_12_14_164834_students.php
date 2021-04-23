<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Students extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->increments('students_id');
            $table->primary('students_id');
            $table->string('students_name',50);
            $table->boolean('gender');
            $table->date('date_of_birth');
            $table->text('email');
            $table->integer('phone_number');
            $table->integer('classes_id')->unsigned();
            $table->foreign('classes_id')
                    ->references('classes_id')->on('classes')
                    ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
}
