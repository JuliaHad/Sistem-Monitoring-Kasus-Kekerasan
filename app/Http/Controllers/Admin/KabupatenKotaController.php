<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\KabupatenKota;

class KabupatenKotaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kabupatenKotas = KabupatenKota::latest()->get();

        return view('admin.kabupaten-kota.index', compact('kabupatenKotas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.kabupaten-kota.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_kabupaten' => 'required|max:255'
        ]);

        KabupatenKota::create([
            'nama_kabupaten' => $request->nama_kabupaten
        ]);

        return redirect()
            ->route('kabupaten-kota.index')
            ->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $kabupatenKota = KabupatenKota::findOrFail($id);

        return view('admin.kabupaten-kota.edit', compact('kabupatenKota'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama_kabupaten' => 'required|max:255'
        ]);

        $kabupatenKota = KabupatenKota::findOrFail($id);

        $kabupatenKota->update([
            'nama_kabupaten' => $request->nama_kabupaten
        ]);

        return redirect()
            ->route('kabupaten-kota.index')
            ->with('success', 'Data berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $kabupatenKota = KabupatenKota::findOrFail($id);

        $kabupatenKota->delete();

        return redirect()
            ->route('kabupaten-kota.index')
            ->with('success', 'Data berhasil dihapus');
    }
}