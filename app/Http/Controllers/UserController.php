<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::select('id', 'nama', 'email', 'nomor_hp', 'role')->get();
        return view('dashboard.userlist' , [
            "title" => "userlist",
            "users" => $users
        ]);
        
        //return user::latest();
        //get posts
        //$users = User::latest();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.postuser', [
            "title" => "postuser"
        ]);
         
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $validatedA = $request->validate([
            'nama' => 'required|max:255',
            'nomor_hp' => ['required','min:12', 'max:20', 'unique:users'],
            'email' => 'required|email:dns|unique:users',
            'role' => 'required|in:admin,kasir,member',
            'password' => 'required|min:8|max:255'
        ]);
        $validatedA['password'] = bcrypt($validatedA['password']);
        User::create($validatedA);
        
        return redirect('/userlist')->with('dtrSuccess', 'User berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

        $user = User::find($id);
        return view('dashboard.edituser', compact('user'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validasi input
    $validatedData = $request->validate([
        'nama' => 'required|max:255',
        'email' => 'required|email',
        'nomor_hp' => ['required','min:12', 'max:20'],
        'role' => 'required|in:admin,kasir,member',
        'password' => 'required|min:8',
    ]);

    // Cari user berdasarkan ID
    $user = User::find($id);

    if ($user) {
        // Update data user
        $user->nama = $validatedData['nama'];
        $user->email = $validatedData['email'];
        $user->nomor_hp = $validatedData['nomor_hp'];
        $user->role = $validatedData['role'];
        $user->password = bcrypt($validatedData['password']); 

        // Simpan perubahan
        $user->save();

        return redirect('/userlist')->with('success', 'Data user berhasil diperbarui');
    } else {
        return redirect('/userlist')->with('error', 'User tidak ditemukan');
    }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id);

        if ($user) {
            $user->delete();
            return redirect('/userlist')->with('dltSuccess', 'User Berhasil Dihapus');
        } else {
            return redirect('/userlist')->with('dltError', 'User Gagal dihapus');
        }

    }

    //pengguna
    public function showProfile()
    {
        $userId = Auth::id();
        $user = User::find($userId); // Menggunakan ID untuk mendapatkan objek User

        return view('profile', compact('user'));
    }

    public function updateProfile(Request $request)
    {
        // Mendapatkan ID pengguna yang sedang diotentikasi
         $userId = Auth::id(); 

        // Mendapatkan data pengguna dari model User
        $user = User::find($userId);

        // Validasi data dari formulir
        $request->validate([
            'nama' => 'required|max:255',
            'email' => 'required|email',
            'nomor_hp' => ['required','min:12', 'max:20'],
            'password' => 'required|min:8',
        ]);

        // Mengupdate data pengguna dengan nilai dari formulir
        $user->nama = $request->input('nama');
        $user->email = $request->input('email');
        $user->nomor_hp = $request->input('nomor_hp');

        // Memeriksa dan mengupdate password jika ada perubahan
        $password = $request->input('password');
        if ($password !== null && $password !== '') {
            $user->password = Hash::make($password);
        }

        // Menyimpan perubahan pada data pengguna ke dalam basis data
        $user->save();

        // Redirect ke halaman profil dengan pesan sukses
        return redirect()->route('profile')->with('success', 'Profile updated successfully');
        
    }
}
