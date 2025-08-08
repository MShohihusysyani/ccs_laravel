<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Carbon;

class AuthController extends Controller
{
    protected $userModel;
    public function __construct()
    {
        $this->userModel = new User();
    }
    public function login(Request $request)
    {
        // Validasi input
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ], [
            'username.required' => 'Username Wajib Diisi!',
            'password.required' => 'Password Wajib Diisi!',
        ]);

        // Cek user berdasarkan username
        $user = User::where('username', $request->username)->first();

        // Cek apakah user ada dan password cocok
        if ($user && Hash::check($request->password, $user->password)) {

            if ($user->active !== 'Aktif') {
                return back()->with('alert', 'User tidak aktif, mohon hubungi Superadmin!');
            }

            // Login manual pakai Auth::login
            Auth::login($user);
            $request->session()->regenerate(); // keamanan

            // Session pesan sukses
            Session::flash('pesan', 'Berhasil Login!');

            return redirect()->intended('home');
        }

        // Jika gagal login
        return back()->with('alert', 'Username atau Password Anda Salah!');
    }
    // public function login(Request $request)
    // {
    //     // Validasi input
    //     $credentials = $request->validate([
    //         'username' => 'required',
    //         'password' => 'required',
    //     ], [
    //         'username.required' => 'Username Wajib Diisi!',
    //         'password.required' => 'Password Wajib Diisi!',
    //     ]);

    //     // Coba login pakai Auth
    //     if (Auth::attempt($credentials)) {
    //         $request->session()->regenerate(); // regenerate session ID (keamanan)

    //         $user = Auth::user();

    //         if ($user->active !== 'Y') {
    //             Auth::logout(); // logout langsung
    //             return back()->with('alert', 'User tidak aktif, Mohon hubungi Superadmin!');
    //         }

    //         // // Update last login
    //         // $user->last_login = Carbon::now();
    //         // $user->save();

    //         Session::flash('pesan', 'Berhasil Login!');

    //         return redirect('home');
    //     }

    //     return back()->with('alert', 'Username atau Password Anda Salah!');
    // }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login')->with('pesan', 'Berhasil logout.');
    }
}
