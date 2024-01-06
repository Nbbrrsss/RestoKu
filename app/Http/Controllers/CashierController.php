<?php

namespace App\Http\Controllers;


use App\Models\Food;
use App\Models\Category; 
use App\Models\Carts;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Redirect;

class CashierController extends Controller
{
    public function indexmenu(Request $request)
    {   
        
        $search = $request->input('search');
        $foods = Food::where('nama_menu', 'like', '%' . $search . '%')->get();
        // Retrieve categories
        $categories = Category::all(); // Misalnya, mengambil semua kategori dari database

        // Initialize foodsByCategory array
        $foodsByCategory = [];

        // Retrieve foods by category
        foreach ($categories as $category) {
            $foodsByCategory[$category->id] = Food::where('kategori_id', $category->id)->get();
        }

        return view('cashier.menu', [
            'foods' => $foods,
            'categories' => $categories,
            'foodsByCategory' => $foodsByCategory,
        ]);
    }
    public function indexcart()
    {
        $userId = Auth::id();
        
        $cartItems = Carts::where('id_user', $userId)->get();
        
        return view('cashier.cart', [
            'cartItems' => $cartItems,
            'title' => 'cart'
        ]);
    }
    public function addToCart(Request $request)
    {
        $foodId = $request->input('food_id');
        $quantity = $request->input('quantity');

        // Lakukan validasi data, contohnya:
        $food = Food::find($foodId);
        if (!$food) {
            return response()->json(['message' => 'Makanan tidak ditemukan'], 404);
        }

        // Simpan ke dalam keranjang (mungkin Anda akan menyimpan ke dalam session jika pengguna belum login)
        $cartItem = [
            'food_id' => $foodId,
            'quantity' => $quantity,
            // Dan informasi lain yang diperlukan dari makanan yang akan ditambahkan
        ];

        $userId = Auth::id();
        $existingCartItem = Carts::where('id_food', $foodId)->where('id_user', $userId)->first();

        if ($existingCartItem) {
            $existingCartItem->increment('quantity');
        } else {
            $randomIdPesanan = Str::random();

            $cart = new Carts([
                'id_pesanan' => $randomIdPesanan,
                'id_food' => $foodId,
                'id_user' => $userId,
                'quantity' => 1,
            ]);
    
            $cart->save();
        }

        // Lakukan sesuai kebutuhan Anda, simpan ke dalam session atau tabel cart
        // Misalnya, menyimpan ke session:
        $cart = session()->get('cart', []);
        $cart[] = $cartItem;
        session()->put('cart', $cart);


        // Response sukses atau redirect kembali ke halaman yang sesuai
        return Redirect::route('menu.indexkasir');
        //return response()->json(['message' => 'Makanan berhasil ditambahkan ke dalam keranjang'], 200);
    }

    public function deleteItem($id)
    {
        // Temukan item dalam keranjang belanja berdasarkan ID
        $cartItem = Carts::find($id);

        if ($cartItem) {
            // Jika item ditemukan, hapus item dari database
            $cartItem->delete();
            // Redirect kembali ke halaman keranjang belanja dengan pesan sukses
            return back()->with('success', 'Item berhasil dihapus dari keranjang belanja.');
        }

        // Jika item tidak ditemukan atau terjadi kesalahan, redirect dengan pesan error
        return back()->with('error', 'Gagal menghapus item dari keranjang belanja.');
    }

    public function checkout(Request $request)
    {
        $user = Auth::user();
        $cartItems = Carts::where('id_user', $user->id)->get();

        $totalAmount = 0;

        foreach ($cartItems as $cartItem) {
            $totalAmount += $cartItem->food->harga * $cartItem->quantity;
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
                'price' => $cartItem->food->harga,
            ]);

            $cartItem->delete();
        }

        // Redirect atau kembalikan response sesuai kebutuhan setelah checkout berhasil
        return redirect('/menukasir');
    }

    public function indexorder()
    {
        $orders = Order::all();

        return view('cashier.kasirorder', ['orders' => $orders]);
    }

    public function showOrderItems($orderId)
    {
        $order = Order::with('orderItems')->find($orderId);

        return view('cashier.kasirorderdetail', ['order' => $order]);
    }

    public function updateStatus(Request $request, Order $order)
    {
        $order->update(['status' => $request->status]);

        // Redirect or return a response as needed
        return redirect()->route('kasirorders.index')->with('success', 'Order status updated successfully');
    }

    public function indexriwayatorder()
    {
        $orders = Order::where('status', 'done')->get();

        return view('cashier.riwayatkasir', ['orders' => $orders]);
    }
}

