<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
        return view('Auth.login');
    }
    public function register()
    {
        return view('Auth.register');
    }
    public function storeRegister(Request $request)
    {
         $validasi = $request->validate([
             'first_name' => 'required|min:4',
             'last_name' => 'required|min:4',
             'email' => 'email|unique:users',
             'password' => 'required|min:4'
         ]);

         User::create([
             'first_name' => $request->first_name,
             'last_name' => $request->last_name,
             'full_name' => $request->first_name . $request->last_name,
             'email' => $request->email,
             'password' => bcrypt($request->password),
         ]);

         return redirect()->route('login')->with('sukses', 'Sukses Mendaftar, Silahkan Login');
    }

    public function authenticate(Request $request)
    {
        $pencocokan = $request->validate([
           'email' => 'required|email',
           'password' => 'required|min:4'
        ]);

        if(Auth::attempt($pencocokan)) {
            $request->session()->regenerate();
            return redirect()->route('Dashboard.index')->with('sukses', 'Sukses Login');
        }

        return back()->withErrors([
            'email' => 'Email Atau Password Salah, Silahkan Coba Lagi'
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        return redirect()->route('login');
    }
}
