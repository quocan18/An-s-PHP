<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Assigned extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assigned', function (Blueprint $table) {
            $table->primary('id')->autoIncrement();
            $table->integer('teacher_id',50);
            $table->foreign('teacher_id')
                    ->references('teacher_id')->on('teacher')
                    ->onDelete('cascade');
            $table->integer('subjects_id',50);
            $table->foreign('subjects_id')
                    ->references('subjects_id')->on('subjects')
                    ->onDelete('cascade');
            $table->integer('classes_id',50);
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
        Schema::dropIfExists('assigned');
    }
}
