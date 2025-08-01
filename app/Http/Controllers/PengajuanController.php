<?php

namespace App\Http\Controllers;

use App\Models\Pengajuan;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PengajuanController extends Controller
{
    /**
     * Menampilkan daftar semua pengajuan.
     */
    public function index()
    {
        $pengajuans = Pengajuan::latest()->paginate(10);
        return view('pengajuan.index', compact('pengajuans'));
    }

    /**
     * Menampilkan form untuk membuat pengajuan baru.
     */
    public function create()
    {
        return view('pengajuan.create');
    }

    /**
     * Menyimpan pengajuan baru ke database.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'no_ppkb' => 'required|string|max:255|unique:pengajuans',
            'nama_kapal' => 'required|string|max:255',
            'jam_masuk' => 'required|date',
            'jam_deploy' => 'required|date',
            'keterangan_from' => 'required|string|max:255',
            'keterangan_to' => 'required|string|max:255',
        ]);

        Pengajuan::create($validatedData);

        return redirect()->route('pengajuan.index')->with('success', 'Data pengajuan berhasil ditambahkan.');
    }

    /**
     * Menampilkan form untuk mengedit pengajuan.
     */
    public function edit(Pengajuan $pengajuan)
    {
        return view('pengajuan.edit', compact('pengajuan'));
    }

    /**
     * Memperbarui data pengajuan di database.
     */
    public function update(Request $request, Pengajuan $pengajuan)
    {
        $validatedData = $request->validate([
            'no_ppkb' => ['required', 'string', 'max:255', Rule::unique('pengajuans')->ignore($pengajuan->id)],
            'nama_kapal' => 'required|string|max:255',
            'jam_masuk' => 'required|date',
            'jam_deploy' => 'required|date',
            'keterangan_from' => 'required|string|max:255',
            'keterangan_to' => 'required|string|max:255',
        ]);

        $pengajuan->update($validatedData);

        return redirect()->route('pengajuan.index')->with('success', 'Data pengajuan berhasil diperbarui.');
    }

    /**
     * Menghapus data pengajuan dari database.
     */
    public function destroy(Pengajuan $pengajuan)
    {
        $pengajuan->delete();
        return redirect()->route('pengajuan.index')->with('success', 'Data pengajuan berhasil dihapus.');
    }
}
