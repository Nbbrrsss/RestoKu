<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Models\Carts;
use Illuminate\Http\Request;
use App\Models\Food;
use App\Http\Requests\StoreCartsRequest;
use App\Http\Requests\UpdateCartsRequest;
use Illuminate\Support\Facades\Redirect;

class CartsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userId = Auth::id();
        
        $cartItems = Carts::where('id_user', $userId)->get();
        
        return view('cart', [
            'cartItems' => $cartItems,
            'title' => 'cart'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
        return Redirect::route('menu.index');
        //return response()->json(['message' => 'Makanan berhasil ditambahkan ke dalam keranjang'], 200);
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCartsRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Carts $carts)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Carts $carts)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCartsRequest $request, Carts $carts)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Carts $carts)
    {
        //
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
}
