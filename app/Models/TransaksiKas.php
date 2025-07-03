<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TransaksiKas extends Model
{
    protected $fillable = [
        'jenis', 
        'kategori',
        'keterangan',
        'jumlah',
        'tanggal',
        'user_id',
    ];
}
