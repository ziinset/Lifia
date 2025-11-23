<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            if (!Schema::hasColumn('users', 'instagram')) {
                $table->string('instagram')->nullable();
            }
            if (!Schema::hasColumn('users', 'tiktok')) {
                $table->string('tiktok')->nullable();
            }
            if (!Schema::hasColumn('users', 'facebook')) {
                $table->string('facebook')->nullable();
            }
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $toDrop = [];
            foreach (['instagram', 'tiktok', 'facebook'] as $col) {
                if (Schema::hasColumn('users', $col)) {
                    $toDrop[] = $col;
                }
            }
            if (!empty($toDrop)) {
                $table->dropColumn($toDrop);
            }
        });
    }
};
