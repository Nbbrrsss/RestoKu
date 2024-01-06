<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(){
        return view('login.index', [
            'title' => 'login'
        ]);
        
    }
    public function authenticate(Request $request){
    $credentials = $request->validate([
        'email' => 'required|email:dns',
        'password' => 'required|min:8|max:255'
    ]);

    if(Auth::attempt($credentials)) {
        $request->session()->regenerate();

        $user = Auth::user(); // Mendapatkan informasi pengguna yang saat ini masuk

        if($user->role === 'admin') {
            return redirect('/dashboard');
        } elseif($user->role === 'kasir') {
            return redirect('/menukasir');
        } elseif($user->role === 'member') {
            return redirect('/menu');
        } else {
            // Handle other roles or default redirection here
            return redirect('/default-page');
        }
    }
    
    return back()->with('loginError', 'Login Gagal!');
}
    
    public function logout(){
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return Redirect('/');   
    }
}
