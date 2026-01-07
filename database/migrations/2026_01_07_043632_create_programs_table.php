<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('programs', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->string('category'); // STEM, Language Arts, etc
            $table->string('duration'); // 1 Year, 2 Years, etc
            $table->string('level'); // Beginner, Intermediate, Advanced
            $table->string('seats_status'); // Available, Limited, Open
            $table->date('start_date');
            $table->boolean('featured')->default(false);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('programs');
    }
};