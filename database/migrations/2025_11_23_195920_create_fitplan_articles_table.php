<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('fitplan_articles', function (Blueprint $table) {
            $table->id();
            $table->string('category'); // turun-berat-badan, bentuk-otot, stamina-energi, tubuh-lentur
            $table->string('title'); // Judul artikel
            $table->string('author'); // Penulis
            $table->text('description'); // Deskripsi singkat
            $table->string('image')->nullable(); // Gambar artikel
            $table->string('link')->nullable(); // Tautan halaman
            $table->boolean('is_featured')->default(false); // Apakah artikel utama
            $table->integer('order')->default(0); // Urutan tampil (1-4 untuk artikel terbaru)
            $table->timestamps();

            // Index untuk query yang lebih cepat
            $table->index('category');
            $table->index('is_featured');
            $table->index('order');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fitplan_articles');
    }
};
