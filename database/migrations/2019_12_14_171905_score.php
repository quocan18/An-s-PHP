<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Score extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('score', function (Blueprint $table) {
            $table->float('score',8,2);
            $table->integer('subjects_id')->unsigned();
            $table->primary('subjects_id');
            $table->foreign('subjects_id')
                    ->references('subjects_id')->on('subjects')
                    ->onDelete('cascade');

            $table->integer('students_id')->unsigned();
            $table->primary('students_id');
            $table->foreign('students_id')
                    ->references('students_id')->on('students')
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
        Schema::dropIfExists('score');
    }
}
