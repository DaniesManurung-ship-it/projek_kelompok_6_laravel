<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('type'); // Academic, Attendance, Financial, Staff
            $table->string('status'); // Published, Pending, Draft
            $table->string('format')->default('PDF'); // PDF, Excel, Word
            $table->date('report_date');
            $table->date('generated_date')->nullable();
            $table->string('generated_by')->nullable();
            $table->text('file_path')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('reports');
    }
};