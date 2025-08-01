<?php

namespace App\Http\Controllers;

use App\Models\Pengajuan;
use App\Models\Permohonan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * Menampilkan halaman dashboard dengan data statistik.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Menghitung total pengajuan
        $totalPengajuan = Pengajuan::count();

        // Menghitung jumlah permohonan berdasarkan status
        // Menggunakan query builder untuk efisiensi
        $statusCounts = Permohonan::query()
            ->select('status', DB::raw('count(*) as total'))
            ->groupBy('status')
            ->pluck('total', 'status');

        $menungguCount = $statusCounts->get('menunggu', 0);
        $selesaiCount = $statusCounts->get('selesai', 0);
        $ditolakCount = $statusCounts->get('ditolak', 0);

        // Mengambil 5 pengajuan terbaru beserta status permohonannya
        $recentPengajuans = Pengajuan::with('permohonan')
            ->latest()
            ->take(5)
            ->get();

        // Kirim semua data ke view
        return view('dashboard', compact(
            'totalPengajuan',
            'menungguCount',
            'selesaiCount',
            'ditolakCount',
            'recentPengajuans'
        ));
    }
}
