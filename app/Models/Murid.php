<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Murid extends Model
{
    protected $fillable = [
        'nama',
        'nis',
        'jenis_kelamin',
        'alamat',
        'telepon',
        'email',
        'kelas_id',
        'angkatan_id',
        'foto',
        'tempat_lahir',
        'status',
        'agama',
        'tanggal_lahir',
        'nama_ayah',
        'nama_ibu',
        'pekerjaan_orang_tua',
    ];

    // Relasi ke Kelas
    public function kelas(): BelongsTo
    {
        return $this->belongsTo(Kelas::class);
    }

    // Relasi ke Angkatan
    public function angkatan(): BelongsTo
    {
        return $this->belongsTo(Angkatan::class);
    }

    public function tagihanMurids(): HasMany
    {
        return $this->hasMany(TagihanMurid::class);
    }

    public function pembayarans(): HasMany
    {
        return $this->hasMany(Pembayaran::class);
    }
}
