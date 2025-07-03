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
        Schema::create('murids', function (Blueprint $table) {
        $table->id();
        $table->string('nama');
        $table->string('nis')->unique();
        $table->string('jenis_kelamin');
        $table->string('alamat')->nullable();
        $table->string('telepon')->nullable();
        $table->string('email')->nullable();
        $table->foreignId('kelas_id')->constrained('kelas')->onDelete('cascade');
        $table->foreignId('angkatan_id')->constrained('angkatans')->onDelete('cascade');
        $table->string('foto')->nullable(); // untuk menyimpan path foto murid
        $table->string('tempat_lahir')->nullable();
        $table->enum('status', ['aktif', 'non-aktif'])->default('aktif');
        $table->string('agama')->nullable();
        $table->date('tanggal_lahir')->nullable();
        $table->string('nama_ayah')->nullable();
        $table->string('nama_ibu')->nullable();
        $table->string('pekerjaan_orang_tua')->nullable();
        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('murids');
    }
};
