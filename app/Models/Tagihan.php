<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Tagihan extends Model
{
    protected $fillable = [
        'nama_tagihan',
        'default_jumlah',
        'tipe_tagihan',
        'target_id',
        'tanggal_jatuh_tempo',
    ];

    protected $casts = [
        'tanggal_jatuh_tempo' => 'date',
        'default_jumlah' => 'decimal:2',
    ];

    public function tagihanMurids(): HasMany
    {
        return $this->hasMany(TagihanMurid::class);
    }
}

