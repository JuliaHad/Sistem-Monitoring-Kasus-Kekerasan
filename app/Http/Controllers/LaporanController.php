<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Laporan;

class LaporanController extends Controller
{
    public function index()
    {
        $laporans = Laporan::latest()->get();
        return view('laporan.index', compact('laporans'));
    }

    public function create()
    {
        return view('laporan.create');
    }

public function store(Request $request)
{
    $request->validate([
        'tahun' => 'required'
    ]);

    Laporan::create([
        'user_id' => auth()->id(),
        'tahun'   => $request->tahun,
    ]);

    return redirect()
        ->route('laporan.index')
        ->with('success', 'Data berhasil ditambahkan');
}

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $laporan = Laporan::findOrFail($id);
        return view('laporan.edit', compact('laporan'));
        }

    public function update(Request $request, string $id)
{
    $laporan = Laporan::findOrFail($id);

    $laporan->update([
        'tahun' => $request->tahun,
    ]);

    return redirect()->route('laporan.index');
}

    public function destroy(string $id)
    {
        $laporan = Laporan::findOrFail($id);
        $laporan->delete();

        return redirect()->route('laporan.index');
    }
}