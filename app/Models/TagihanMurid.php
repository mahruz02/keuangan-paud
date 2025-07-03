<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TagihanMurid extends Model
{
    protected $fillable = [
        'murid_id',
        'tagihan_id',
        'jumlah_tagihan',
        'jumlah_terbayar',
        'tanggal_jatuh_tempo',
    ];

    protected $casts = [
        'tanggal_jatuh_tempo' => 'date',
        'jumlah_tagihan' => 'decimal:2',
        'jumlah_terbayar' => 'decimal:2',
    ];

    public function murid(): BelongsTo
    {
        return $this->belongsTo(Murid::class);
    }

    public function tagihan(): BelongsTo
    {
        return $this->belongsTo(Tagihan::class);
    }

    public function pembayarans(): HasMany
    {
        return $this->hasMany(Pembayaran::class);
    }

    // Accessor untuk menghitung sisa pembayaran
    public function getSisaPembayaranAttribute(): float
    {
        return $this->jumlah_tagihan - $this->jumlah_terbayar;
    }

    // Accessor untuk mendapatkan status (berdasarkan sisa pembayaran)
    public function getStatusAttribute(): string
    {
        if ($this->jumlah_terbayar >= $this->jumlah_tagihan) {
            return 'Lunas';
        } elseif ($this->jumlah_terbayar > 0) {
            return 'Sebagian Terbayar';
        } else {
            return 'Belum Terbayar';
        }
    }
}
