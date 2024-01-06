<?php

namespace App\Http\Controllers; 

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::all();

        return view('dashboard.order', ['orders' => $orders]);
    }

    public function showOrderItems($orderId)
    {
        $order = Order::with('orderItems')->find($orderId);

        return view('dashboard.orderdetail', ['order' => $order]);
    }
    public function updateStatus(Request $request, Order $order)
    {
        $order->update(['status' => $request->status]);

        // Redirect or return a response as needed
        return redirect()->route('orders.index')->with('success', 'Order status updated successfully');
    }

    
    public function indexUser()
    {
        $user = Auth::id();
        $orders = Order::where('user_id', $user)->get();

        return view('myorder', ['orders' => $orders]);
    }

    public function showOrderItemsUser($orderId)
    {
        $user = Auth::id();
        $order = Order::where('id', $orderId)
                        ->where('user_id', $user)
                        ->with('orderItems')
                        ->first();

        if (!$order) {
            // Pesanan tidak ditemukan atau bukan milik pengguna yang sedang masuk
            // Lakukan penanganan kesalahan, seperti menampilkan pesan atau mengarahkan pengguna ke halaman lain
            return redirect('/');
        }

        return view('myorderdetail', ['order' => $order]);
    }
}
