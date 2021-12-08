<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Contracts\Auth\Authenticatable;

class LoginController extends Controller
{
    //fungsi untuk menampilkan halaman login
    public function index() {
        return view('login.index', [
            'title' => 'Login'
        ]);
    }

    //fungsi untuk menyimpan data user baru
    public function store(Request $request) {
        $validatedData = $request->validate([
            'id_pengguna' => ['required', 'unique:users'],
            'username' => ['required', 'min:3', 'max:255'],
            'password' => ['required', 'min:5', 'max:255']
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);

        User::create($validatedData);

        return redirect('/login')->with('success', 'Registrasi Berhasil! Silahkan Login');
    }

    //fungsi untuk melakukan autentikasi
    public function authenticate(Request $request) {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        if(Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/categories');
        }

        return back()->with('failed', 'Login Gagal');
    }

    //fungsi untuk logout
    public function logout() {
        Auth::logout();

        request()->session()->invalidate();

        request()->session()->regenerateToken();

        return redirect('/login');
    }
}
