<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLessonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lessons', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->date('weekday');
            $table->time('start_time');
            $table->time('end_time');
            $table->string('schclass');
            $table->string('subject');
            $table->string('teacher');
            $table->string('teacher_name')->nullable();
            $table->string('subject_name')->nullable();
            $table->string('class_name')->nullable();
            $table->string('room');
            $table->string('school_year');
            $table->string('term');
            $table->integer('class_size')->nullable();
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
        Schema::dropIfExists('lessons');
    }
}
