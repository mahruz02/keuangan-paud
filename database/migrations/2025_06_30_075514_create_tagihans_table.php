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
        Schema::create('tagihans', function (Blueprint $table) {
            $table->id();
            $table->string('nama_tagihan');
            $table->decimal('default_jumlah', 15, 2)->nullable(); // Jumlah default, bisa di-override di tagihan_murids
            $table->enum('tipe_tagihan', ['global', 'angkatan', 'kelas', 'individu']); // Tipe penerapan tagihan
            $table->unsignedBigInteger('target_id')->nullable(); // ID Angkatan, Kelas, atau Murid (jika tipe individu)
            $table->date('tanggal_jatuh_tempo')->nullable(); // Tanggal jatuh tempo default
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tagihans');
    }
};
