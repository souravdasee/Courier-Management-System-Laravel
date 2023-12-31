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
        Schema::create('couriers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('users_id')->constrained()->cascadeOnDelete();
            $table->string('sender_name');
            $table->string('recipient_name');
            $table->decimal('weight');
            $table->unsignedBigInteger('sender_number');
            $table->unsignedBigInteger('recipient_number');
            $table->string('from');
            $table->string('to');
            $table->string('sender_address');
            $table->string('recipient_address');
            $table->decimal('distance');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('couriers');
    }
};
