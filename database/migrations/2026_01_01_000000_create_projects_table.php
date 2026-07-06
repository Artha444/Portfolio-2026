<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('category');
            $table->json('tags');
            $table->text('description');
            $table->json('images'); // Menyimpan path gambar sebagai JSON array
            $table->string('link')->nullable();
            $table->timestamps();
        });
    }
};