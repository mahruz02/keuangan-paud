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
        Schema::create('pembayarans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('murid_id')->constrained()->onDelete('cascade'); // Murid yang membayar
            $table->foreignId('tagihan_murid_id')->nullable()->constrained()->onDelete('set null'); // Tagihan spesifik yang dibayar (nullable)
            $table->decimal('jumlah', 15, 2); // Jumlah pembayaran
            $table->date('tanggal_pembayaran');
            $table->string('metode_pembayaran')->nullable(); // Misal: Tunai, Transfer
            $table->text('keterangan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembayarans');
    }
};
