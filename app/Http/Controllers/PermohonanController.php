<?php

namespace App\Http\Controllers;

use App\Models\Permohonan;
use Illuminate\Http\Request;

class PermohonanController extends Controller
{
    /**
     * Menampilkan daftar permohonan yang masuk.
     */
    public function index()
    {
        // Ambil data permohonan beserta relasi pengajuannya
        $permohonans = Permohonan::with('pengajuan')->latest()->paginate(10);
        return view('permohonan.index', compact('permohonans'));
    }

    /**
     * Menampilkan detail satu permohonan.
     */
    public function show(Permohonan $permohonan)
    {
        // Load relasi pengajuan untuk ditampilkan di view
        $permohonan->load('pengajuan');
        return view('permohonan.show', compact('permohonan'));
    }

    /**
     * Mengubah status permohonan (Selesai atau Ditolak).
     */
    public function updateStatus(Request $request, Permohonan $permohonan)
    {
        $request->validate([
            'status' => 'required|in:selesai,ditolak',
            // Alasan wajib diisi jika statusnya 'ditolak'
            'alasan_ditolak' => 'required_if:status,ditolak|nullable|string',
        ]);

        $permohonan->update([
            'status' => $request->status,
            'alasan_ditolak' => $request->status == 'ditolak' ? $request->alasan_ditolak : null,
        ]);

        return redirect()->route('permohonan.index')->with('success', 'Status permohonan berhasil diperbarui.');
    }
}
