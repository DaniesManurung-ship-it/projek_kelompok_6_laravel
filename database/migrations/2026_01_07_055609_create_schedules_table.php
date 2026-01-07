<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('schedules', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('class_name');
            $table->string('teacher');
            $table->string('room');
            $table->string('day'); // Monday, Tuesday, etc
            $table->time('start_time');
            $table->time('end_time');
            $table->string('type'); // Class, Exam, Event, Meeting
            $table->string('status'); // In Progress, Upcoming, Completed, Cancelled
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('schedules');
    }
};