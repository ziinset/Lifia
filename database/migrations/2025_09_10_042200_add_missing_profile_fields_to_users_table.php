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
        Schema::table('users', function (Blueprint $table) {
            // Cek dan tambah kolom yang belum ada
            if (!Schema::hasColumn('users', 'nomor')) {
                $table->string('nomor')->nullable()->after('foto');
            }
            if (!Schema::hasColumn('users', 'jenis_kelamin')) {
                $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan'])->nullable()->after('nomor');
            }
            if (!Schema::hasColumn('users', 'tanggal_lahir')) {
                $table->date('tanggal_lahir')->nullable()->after('jenis_kelamin');
            }
            if (!Schema::hasColumn('users', 'hobi')) {
                $table->string('hobi')->nullable()->after('tanggal_lahir');
            }
            if (!Schema::hasColumn('users', 'bio')) {
                $table->text('bio')->nullable()->after('hobi');
            }
            if (!Schema::hasColumn('users', 'instagram')) {
                $table->string('instagram')->nullable()->after('bio');
            }
            if (!Schema::hasColumn('users', 'tiktok')) {
                $table->string('tiktok')->nullable()->after('instagram');
            }
            if (!Schema::hasColumn('users', 'facebook')) {
                $table->string('facebook')->nullable()->after('tiktok');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'nomor',
                'jenis_kelamin', 
                'tanggal_lahir',
                'hobi',
                'bio',
                'instagram',
                'tiktok',
                'facebook'
            ]);
        });
    }
};
