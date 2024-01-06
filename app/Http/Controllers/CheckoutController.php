<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Carts;

class CheckoutController extends Controller
{
    public function checkout(Request $request)
    {
        $user = Auth::user();
        $cartItems = Carts::where('id_user', $user->id)->get();

        $totalAmount = 0;

        foreach ($cartItems as $cartItem) {
            $totalAmount += $cartItem->food->harga_promo * $cartItem->quantity;
        }

        // Ambil nomor meja dari input form
        $nomorMeja = $request->input('nomor_meja');

        $order = Order::create([
            'user_id' => $user->id,
            'nomor_meja' => $nomorMeja,
            'total_amount' => $totalAmount,
            'status' => 'unpaid',
        ]);

        foreach ($cartItems as $cartItem) {
            OrderItem::create([
                'order_id' => $order->id,
                'food_id' => $cartItem->id_food,
                'quantity' => $cartItem->quantity,
                'price' => $cartItem->food->harga_promo,
            ]);

            $cartItem->delete();
        }

        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = config('midtrans.server_key');
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;

        $params = array(
            'transaction_details' => array(
                'order_id' => $order->id,
                'user_id' => $user->id,
                'nomor_meja' => $nomorMeja,
                'gross_amount' => max($order->total_amount, 0.01),
                'status' => 'unpaid',
            ),
        );

        $snapToken = \Midtrans\Snap::getSnapToken($params);
        // Redirect atau kembalikan response sesuai kebutuhan setelah checkout berhasil
        return redirect('/cart')->with('snapToken','order', $snapToken);
    }
}
