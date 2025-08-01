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
        Schema::create('permohonans', function (Blueprint $table) {
            $table->id();

            // Relasi one-to-one dengan tabel pengajuans
            $table->foreignId('pengajuan_id')->constrained('pengajuans')->onDelete('cascade');

            // Status pengajuan
            $table->enum('status', ['menunggu', 'selesai', 'ditolak'])->default('menunggu');

            // Alasan jika ditolak (bisa null)
            $table->text('alasan_ditolak')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('permohonans');
    }
};
