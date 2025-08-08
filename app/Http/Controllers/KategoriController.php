<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class KategoriController extends Controller
{
    protected $kategoriModel;

    public function __construct()
    {
        $this->kategoriModel = new Kategori();
    }

    public function index()
    {
        $data = [
            'title'      => 'Data Kategori',
            'kategoris' => $this->kategoriModel->getData(),
        ];

        return view('kelola.kategori.index', $data);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_kategori' => 'required',
        ], [
            'nama_kategori.required' => 'Nama Kategori Wajib Diisi!',
        ]);

        if ($validator->fails()) {
            // Kirim pesan error pertama ke flash session 'alert' untuk SweetAlert2
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('alert', $validator->errors()->first());
        }

        Kategori::create([
            'nama_kategori' => $request->input('nama_kategori'),
        ]);

        return redirect()->route('kelola.kategori.index')
            ->with('pesan', 'Data berhasil disimpan!');
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_kategori' => 'required',
        ], [
            'nama_kategori.required' => 'Nama Kategori Wajib Diisi!',
        ]);

        if ($validator->fails()) {
            // Kirim pesan error pertama ke flash session 'alert' untuk SweetAlert2
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('alert', $validator->errors()->first());
        }

        $kategori = Kategori::findOrFail($request->input('id_kategori'));
        $kategori->update([
            'nama_kategori' => $request->input('nama_kategori'),
        ]);

        return redirect()->route('kelola.kategori.index')
            ->with('pesan', 'Data berhasil diubah!');
    }

    public function delete($id)
    {
        $kategori = Kategori::findOrfail($id);
        $kategori->delete();
        return redirect()->route('kelola.kategori.index')
            ->with('pesan', 'Data berhasil dihapus!');
    }
}
