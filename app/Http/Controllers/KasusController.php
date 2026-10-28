<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kasus;

class KasusController extends Controller
{
    // Tampilkan semua data
    public function index()
    {
        $data = Kasus::all();
        return view('kasus.index', compact('data'));
    }

    // Tampilkan form tambah data
    public function create()
    {
        return view('kasus.create');
    }

    // Simpan data ke database
    public function store(Request $request)
    {
        Kasus::create([
            'tahun' => $request->tahun,
            'kabupaten' => $request->kabupaten,
            'usia' => $request->usia,
            'pekerjaan' => $request->pekerjaan,
            'tempat' => $request->tempat,
            'kekerasan' => $request->kekerasan,
            'pendidikan' => $request->pendidikan,
            'layanan' => $request->layanan,
        ]);

        return redirect('/kasus')->with('success', 'Data berhasil ditambahkan');
    }

    // (sementara kosong dulu, nanti kita isi)
    public function show($id) {}
    public function edit($id) {}
    public function update(Request $request, $id) {}
    public function destroy($id) {}
}