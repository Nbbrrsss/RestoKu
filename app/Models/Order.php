<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['user_id', 'total_amount','nomor_meja', 'status'];
    
    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }

    // Definisikan relasi ke User atau ke model lain jika diperlukan
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getOrderWithItems($orderId)
    {
        $order = Order::with('orderItems')->find($orderId);

        // Lakukan apapun yang diperlukan dengan data order dan order items

        return view('orderdetail', ['order' => $order]);
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
}
