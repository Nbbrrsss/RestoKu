<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [
        'user_id', // Tambahkan field 'user_id' di sini
        // Tambahkan field lain yang diperlukan untuk diisi secara massal jika ada
        'total_harga',
        'metode_pembayaran',
        'status_pembayaran',
        'tanggal_transaksi',
    ];
}
