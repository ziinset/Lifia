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
            $table->string('lokasi')->nullable()->after('role');
            $table->string('foto')->nullable()->after('lokasi');
            $table->string('nomor')->nullable()->after('foto');
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan'])->nullable()->after('nomor');
            $table->date('tanggal_lahir')->nullable()->after('jenis_kelamin');
            $table->string('hobi')->nullable()->after('tanggal_lahir');
            $table->text('bio')->nullable()->after('hobi');
            $table->string('instagram')->nullable()->after('bio');
            $table->string('tiktok')->nullable()->after('instagram');
            $table->string('facebook')->nullable()->after('tiktok');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'lokasi',
                'foto',
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
