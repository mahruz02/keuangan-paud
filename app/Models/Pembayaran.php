<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pembayaran extends Model
{
    protected $fillable = [
        'murid_id',
        'tagihan_murid_id',
        'jumlah',
        'tanggal_pembayaran',
        'metode_pembayaran',
        'keterangan',
    ];

    // Relasi ke Murid
    public function murid(): BelongsTo
    {
        return $this->belongsTo(Murid::class);
    }

    // Relasi ke TagihanMurid (pivot)
    public function tagihanMurid(): BelongsTo
    {
        return $this->belongsTo(TagihanMurid::class);
    }
}
