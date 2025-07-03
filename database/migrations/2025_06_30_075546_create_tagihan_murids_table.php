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
        Schema::create('tagihan_murids', function (Blueprint $table) {
            $table->id();
            $table->foreignId('murid_id')->constrained()->onDelete('cascade'); // Link ke murid
            $table->foreignId('tagihan_id')->constrained()->onDelete('cascade'); // Link ke jenis tagihan
            $table->decimal('jumlah_tagihan', 15, 2); // Jumlah tagihan spesifik untuk murid ini
            $table->decimal('jumlah_terbayar', 15, 2)->default(0); // Jumlah yang sudah dibayar untuk tagihan ini
            $table->date('tanggal_jatuh_tempo')->nullable(); // Tanggal jatuh tempo spesifik (override default)
            $table->timestamps();

            // Unique constraint dihapus untuk memungkinkan multiple entries per tagihan_id (misal: SPP bulanan)
            // $table->unique(['murid_id', 'tagihan_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tagihan_murids');
    }
};
