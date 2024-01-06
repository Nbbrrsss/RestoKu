<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginAdminController extends Controller
{
    public function index(){
        return view('loginadmin.index', [
            'title' => 'loginadmin'
        ]);   
    }
    public function authenticateadmin(Request $request){
        $adminn = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required|min:8|max:255',
        ]);

        if (Auth::attempt($adminn)) {
            $request->session()->regenerate();
            $user = Auth::user();
        
            if ($user->role === 'admin') {
                $request->session()->put('role', 'admin');
                return redirect()->intended('/dashboard'); 
            } else {
                Auth::logout();
                return back()->with('loginError', 'Anda tidak memiliki izin admin.');
            }
        }

        //return back()->with('loginError', 'Login Gagal!');
        
    }
}
