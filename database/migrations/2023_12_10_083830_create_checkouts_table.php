<?php

use App\Models\Role;
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
        Schema::create('checkouts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('users_id')->constrained()->cascadeOnDelete();
            $table->string('role')->default('User');
            $table->string('users_name');
            $table->string('from');
            $table->string('to');
            $table->bigInteger('weight');
            $table->bigInteger('parcel_amounts');
            $table->string('payment_method');
            $table->string('payment_status')->default('Paid');
            $table->bigInteger('tracking_id')->unique();
            $table->string('current_status')->default('Booked');
            $table->string('remarks')->nullable();
            $table->string('image')->nullable();
            $table->string('voice')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('checkouts');
    }
};
