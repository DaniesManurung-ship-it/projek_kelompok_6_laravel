<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Http\Controllers\DocumentController; 

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('documents', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->string('type'); // PDF, Excel, Word, Image
        $table->string('size');
        $table->string('category'); // Academic, Administrative, Financial
        $table->string('file_path');
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('documents');
    }
};
