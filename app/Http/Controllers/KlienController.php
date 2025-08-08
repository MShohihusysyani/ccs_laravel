<?php

namespace App\Http\Controllers;

use App\Models\Klien;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class KlienController extends Controller
{
    protected $klienModel;
    public function __construct()
    {
        $this->klienModel = new Klien();
    }
    public function index()
    {
        $data =  [
            'title'      => 'Data Klien',
            'kliens'     => $this->klienModel->getData(),
            'kode_klien' => $this->klienModel->generateKode(),
        ];

        return view('kelola.klien.index', $data);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'kode_klien' => 'required',
            'nama_klien' => 'required',
            'status'     => 'required',
        ], [
            'kode_klien.required' => 'Kode Klien Wajib Diisi!',
            'nama_klien.required' => 'Nama Klien Wajib Diisi!',
            'status.required'     => 'Status Wajib Diisi!',
        ]);

        if ($validator->fails()) {
            // Kirim pesan error pertama ke flash session 'alert' untuk SweetAlert2
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('alert', $validator->errors()->first());
        }

        Klien::create([
            'kode_klien' => $request->input('kode_klien'),
            'nama_klien' => $request->input('nama_klien'),
            'status'     => $request->input('status'),
        ]);

        return redirect()->route('kelola.klien.index')
            ->with('pesan', 'Data berhasil disimpan!');
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'kode_klien' => 'required',
            'nama_klien' => 'required',
            'status'     => 'required',
        ], [
            'kode_klien.required' => 'Kode Klien Wajib Diisi!',
            'nama_klien.required' => 'Nama Klien Wajib Diisi!',
            'status.required'     => 'Status Wajib Diisi!',
        ]);

        if ($validator->fails()) {
            // Kirim pesan error pertama ke flash session 'alert' untuk SweetAlert2
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('alert', $validator->errors()->first());
        }

        $klien = Klien::findOrFail($request->input('id_klien'));
        $klien->update([
            'kode_klien' => $request->input('kode_klien'),
            'nama_klien' => $request->input('nama_klien'),
            'status'     => $request->input('status'),
        ]);

        return redirect()->route('kelola.klien.index')
            ->with('pesan', 'Data berhasil diubah!');
    }

    public function delete($id)
    {
        $klien = Klien::findOrfail($id);
        $klien->delete();
        return redirect()->route('kelola.klien.index')
            ->with('pesan', 'Data berhasil dihapus!');
    }
}
