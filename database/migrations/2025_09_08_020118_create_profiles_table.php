<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasTable('profiles')) {
            Schema::create('profiles', function (Blueprint $table) {
                $table->id();
                $table->foreignId('user_id')->constrained()->onDelete('cascade');
                $table->string('nomor')->nullable();
                $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan'])->nullable();
                $table->date('tanggal_lahir')->nullable();
                $table->string('hobi')->nullable();
                $table->text('bio')->nullable();
                $table->timestamps();
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};
