<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carts extends Model
{
    use HasFactory;

    protected $table = 'carts';
    protected $fillable = ['id_pesanan','id_food','nomor_meja', 'id_user', 'quantity'];

    public function food()
    {
        return $this->belongsTo(Food::class,'id_food'); // Sesuaikan dengan nama model Food yang Anda miliki
    }

    public function user()
    {
        return $this->belongsTo(User::class,'id');
    }
}
