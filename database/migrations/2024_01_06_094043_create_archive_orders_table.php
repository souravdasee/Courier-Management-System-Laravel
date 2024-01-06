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
        Schema::create('archive_orders', function (Blueprint $table) {
            $table->id();
            $table->string('checkout_id');
            $table->foreignId('users_id')->constrained()->cascadeOnDelete();
            $table->string('role')->default('User');
            $table->string('users_name');
            $table->string('sender_name');
            $table->string('recipient_name');
            $table->unsignedBigInteger('sender_number');
            $table->unsignedBigInteger('recipient_number');
            $table->string('from');
            $table->string('to');
            $table->string('sender_address');
            $table->string('recipient_address');
            $table->decimal('distance');
            $table->decimal('weight');
            $table->unsignedBigInteger('parcel_amounts');
            $table->string('payment_method');
            $table->string('payment_status')->default('Paid');
            $table->string('tracking_id');
            $table->string('current_location')->default('Not shipped');
            $table->string('current_status')->default('Booked');
            $table->string('remarks')->nullable();
            $table->string('image')->nullable();
            $table->string('voice')->nullable();
            $table->string('checkout_created_at');
            $table->string('checkout_updated_at');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('archive_orders');
    }
};
