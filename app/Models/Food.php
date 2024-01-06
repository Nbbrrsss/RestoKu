<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Food extends Model
{   
    use HasFactory;

    //protected $table = 'food'; // Menyatakan tabel yang terkait dengan model ini
    //protected $primaryKey = 'id'; // Menyatakan primary key dari tabel
    // Tambahkan guarded atau fillable jika diperlukan untuk mass assignment
    protected $guarded = ['id'];
    protected $fillable = [
        'id_menu',
        'kategori_id',
        'gambar_menu',
        'nama_menu',
        'ringkasan',
        'harga',
        'harga_promo'    
    ];
    public function category()
    {   
        return $this->belongsTo(Category::class, 'kategori_id');
    }
}