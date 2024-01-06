<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionsDetail extends Model
{
    use HasFactory;
    protected $fillable = [
        'transaction_id', // Tambahkan field 'transaction_id' di sini
        // Tambahkan field lain yang diperlukan untuk diisi secara massal jika ada
        'food_id',
        'jumlah',
        'harga_satuan',
        'total_harga',
    ];
    public function transaction()
    {
        return $this->belongsTo(Transaction::class);
    }
}
