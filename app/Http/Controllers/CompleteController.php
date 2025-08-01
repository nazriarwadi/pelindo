<?php

namespace App\Http\Controllers;

use App\Models\Permohonan;
use Illuminate\Http\Request;

class CompleteController extends Controller
{
    /**
     * Menampilkan halaman data yang sudah selesai atau ditolak.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Kembalikan ke paginasi server-side
        $permohonans = Permohonan::with('pengajuan')
            ->latest('updated_at')
            ->paginate(10); // Ganti get() menjadi paginate(10)

        return view('complete.index', compact('permohonans'));
    }
}
