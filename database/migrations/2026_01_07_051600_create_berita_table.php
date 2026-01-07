<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('berita', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->string('category'); // Academic, Sports, Events, Achievements
            $table->string('penulis');
            $table->integer('views')->default(0);
            $table->boolean('featured')->default(false);
            $table->date('publish_date');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('berita');
    }
};