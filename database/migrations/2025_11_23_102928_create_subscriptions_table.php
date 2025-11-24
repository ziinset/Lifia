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
        Schema::create('subscriptions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('subscription_id', 20)->unique();
            $table->string('order_id')->unique()->nullable(); // Order ID dari Midtrans
            $table->string('midtrans_transaction_id')->nullable(); // Transaction ID dari Midtrans
            $table->enum('package_type', ['standar_weekly', 'standar_monthly', 'pelajar_weekly', 'pelajar_monthly'])->nullable();
            $table->string('package_name', 50);
            $table->decimal('price', 10, 2)->default(0.00);
            $table->enum('status', ['pending', 'active', 'expired', 'cancelled', 'failed'])->default('pending');
            $table->date('start_date');
            $table->date('end_date');
            $table->timestamps();

            $table->index('user_id');
            $table->index('status');
            $table->index('end_date');
            $table->index('subscription_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subscriptions');
    }
};
