<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Klien;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    protected $userModel, $klienModel;

    public function __construct()
    {
        $this->userModel  = new User();
        $this->klienModel = new Klien();
    }

    public function index()
    {
        $data =  [
            'title'  => 'Data User',
            'users'  => $this->userModel->getData(),
            'kliens' => $this->klienModel->getData(),
        ];

        return view('kelola.user.index', $data);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_user'      => 'required',
            'username'       => 'required|unique:users,username',
            'password'       => 'required|min:8',
            'role'           => 'required',
            'active'         => 'required',
            'klien_id'       => 'nullable',
            'tgl_registrasi' => 'required',
        ], [
            'username.required' => 'Username Wajib Diisi!',
            'username.unique'   => 'Username Sudah Terdaftar, Silahkan Gunakan Username Lain!',
            'password.required' => 'Password Wajib Diisi!',
            'password.min'      => 'Password Minimal 8 Karakter!',
            'role.required'     => 'Role Wajib Diisi!',
        ]);

        if ($validator->fails()) {
            // Kirim pesan error pertama ke flash session 'alert' untuk SweetAlert2
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('alert', $validator->errors()->first());
        }

        User::create([
            'nama_user'      => $request->input('nama_user'),
            'username'       => $request->input('username'),
            'password'       => Hash::make($request->input('password')),
            'role'           => $request->input('role'),
            'active'         => $request->input('active'),
            'klien_id'       => $request->input('klien_id'),
            'tgl_registrasi' => $request->input('tgl_registrasi'),
        ]);

        return redirect()->route('kelola.user.index')->with('pesan', 'Data berhasil ditambahkan');
    }

    public function update(Request $request)
    {
        $id = $request->input('id_user');
        $user = User::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'nama_user'      => 'required',
            'username'       => 'required',
            'password'       => 'nullable|min:8',
            'role'           => 'required',
            'active'         => 'required',
            'klien_id'       => 'nullable',
            'tgl_registrasi' => 'required',
        ], [
            'username.required' => 'Username Wajib Diisi!',
            'password.min'      => 'Password Minimal 8 Karakter!',
            'role.required'     => 'Role Wajib Diisi!',
        ]);

        if ($validator->fails()) {
            // Kirim pesan error pertama ke flash session 'alert' untuk SweetAlert2
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('alert', $validator->errors()->first());
        }

        $data = [
            'nama_user'      => $request->input('nama_user'),
            'username'       => $request->input('username'),
            'role'           => $request->input('role'),
            'active'         => $request->input('active'),
            'klien_id'       => $request['role'] === 'klien' ? $request['klien_id'] : null,
            'tgl_registrasi' => $request->input('tgl_registrasi'),

        ];

        if (!empty($request->input('password'))) {
            $data['password'] = Hash::make($request->input('password'));
        }

        $user->update($data);

        return redirect()->route('kelola.user.index')->with('pesan', 'Data berhasil diubah');
    }

    public function delete($id)
    {
        $user = User::findOrfail($id);
        $user->delete();
        return redirect()->route('kelola.user.index')
            ->with('pesan', 'Data berhasil dihapus!');
    }
}
