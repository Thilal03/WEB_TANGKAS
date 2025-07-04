<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('zidan_pembayaran', function (Blueprint $table) {
            $table->id();
            $table->foreignId('booking_id')->constrained('zidan_booking')->onDelete('cascade');
            $table->string('metode');
            $table->decimal('jumlah', 12, 2);
            $table->string('status')->default('pending');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('zidan_pembayaran');
    }
}; 