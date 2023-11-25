<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    protected $redirectTo = '/home';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        // dd("hello");
        if (Auth::attempt($credentials)) {
            // Jika pengguna berhasil login, simpan informasi pengguna dalam sesi
            $request->session()->regenerate(); // Regenerate session ID untuk mencegah risiko peretasan
            $request->session()->put('user', Auth::user());

            return redirect()->intended($this->redirectTo);
        }

        return redirect()->back()->withErrors(['email' => 'Invalid credentials']);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        // Hapus semua data sesi setelah logout
        $request->session()->flush();

        return redirect('/login');
    }
}
