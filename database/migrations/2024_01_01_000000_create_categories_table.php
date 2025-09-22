<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Nama kategori (Pola Makan Sehat)
            $table->string('slug')->unique(); // URL slug (pola-makan-sehat)
            $table->text('description')->nullable(); // Deskripsi kategori
            $table->string('icon')->nullable(); // Icon untuk kategori
            $table->string('color')->default('#4E342E'); // Warna tema kategori
            $table->boolean('is_active')->default(true); // Status aktif/nonaktif
            $table->integer('sort_order')->default(0); // Urutan tampil di navbar
            $table->enum('header_type', ['header', 'header1', 'hero-mental', 'hero-olga'])->default('header'); // Tipe header
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
        Schema::dropIfExists('categories');
    }
};
