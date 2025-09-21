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
        Schema::create('favorites', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('article_id'); // Unique identifier for each article
            $table->string('article_title');
            $table->string('article_category'); // pola-makan-sehat, aktivitas-fisik, etc.
            $table->string('article_image')->nullable();
            $table->text('article_description')->nullable();
            $table->string('article_author')->nullable();
            $table->string('article_url')->nullable(); // URL to the full article
            $table->timestamps();

            // Prevent duplicate favorites for same user and article
            $table->unique(['user_id', 'article_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('favorites');
    }
};