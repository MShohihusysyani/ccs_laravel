<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class HomeController extends Controller
{
    protected $userModel;
    public function __construct()
    {
        $this->userModel = new User();
    }
    public function index()
    {
        $user = Auth::user(); // sudah login, dijamin

        if (!$user || !$user->role) {
            return redirect('/login')->with('alert', 'Akses tidak valid.');
        }

        $data = [
            'title'                    => 'Dashboard',
            // Tambahkan jika kamu punya model:
            // 'total_user' => User::count(),
        ];

        switch ($user->role) {
            case 'superadmin':
                return view('home.superadmin', $data);
            case 'klien':
                return view('home.klien', $data);
            case 'supervisor1':
                return view('home.supervisor1', $data);
            case 'supervisor2':
                return view('home.supervisor2', $data);
            case 'helpdesk':
                return view('home.helpdesk', $data);
            case 'implementator':
                return view('home.implementator', $data);
            default:
                return redirect('/login')->with('alert', 'Role tidak dikenali.');
        }
    }
}
