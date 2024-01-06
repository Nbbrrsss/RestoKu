<?php

namespace App\Http\Controllers;

use App\Models\Food;
use Illuminate\Http\Request;

class FoodController extends Controller
{
    public function index()
    {
        $foods = Food::all(); // Ambil semua data dari tabel food
        return view('dashboard.product', ['foods' => $foods]);
    }
    
    public function edit(Food $food)
    {
        return view('dashboard.editproduct', compact('food'));
    }

    public function update(Request $request, Food $food)
    {
        // Validasi data yang diinputkan jika diperlukan
        $validatedData = $request->validate([
            'id_menu' => 'required',
            'kategori_id' => 'required',
            'nama_menu' => 'required',
            'ringkasan' => 'required',
            'harga' => 'required',
            'harga_promo' => 'required',
            // Tambahkan validasi lainnya sesuai kebutuhan
        ]);

        if ($request->hasFile('gambar_menu')) {
            $file = $request->file('gambar_menu');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('img/menu'), $fileName);
    
            // Hapus gambar lama jika perlu
            // unlink(public_path('img/' . $food->gambar_menu));
    
            $validatedData['gambar_menu'] = $fileName;
        } else {
            // Jika tidak ada file baru diunggah, gunakan gambar lama
            $validatedData['gambar_menu'] = $food->gambar_menu;
        }

        $food->update($validatedData);

        return redirect()->route('foods.index')->with('edtSuccess', 'Data Berhasil Diupdate');
    }

    public function destroy(Food $food)
    {
        $food->delete();

        return redirect()->route('foods.index')->with('dltSuccess', 'Data Berhasil Dihapus');
    }

    public function store(Request $request)
    {
    $validatedData = $request->validate([
        'id_menu' => 'required',
        'kategori_id' => 'required',
        'nama_menu' => 'required',
        'ringkasan' => 'required',
        'harga' => 'required',
        'harga_promo' => 'required',
        'gambar_menu' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048', // Atur validasi untuk tipe dan ukuran file
        // Tambahkan validasi lainnya sesuai kebutuhan
    ]);

    $file = $request->file('gambar_menu');
    $fileName = time() . '_' . $file->getClientOriginalName();
    $file->move(public_path('img/menu'), $fileName);

    $validatedData['gambar_menu'] = $fileName;

    Food::create($validatedData);

    return redirect()->route('foods.index')->with('inpSuccess', 'Data Berhasil Disimpan');
    }

}
