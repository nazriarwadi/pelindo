<?php

namespace App\Observers;

use App\Models\Pengajuan;

class PengajuanObserver
{
    /**
     * Handle the Pengajuan "created" event.
     */
    public function created(Pengajuan $pengajuan): void
    {
        // Secara otomatis membuat data permohonan terkait
        // setiap kali pengajuan baru berhasil dibuat.
        $pengajuan->permohonan()->create([
            'status' => 'menunggu',
        ]);
    }

    /**
     * Handle the Pengajuan "updated" event.
     */
    public function updated(Pengajuan $pengajuan): void
    {
        //
    }

    /**
     * Handle the Pengajuan "deleted" event.
     */
    public function deleted(Pengajuan $pengajuan): void
    {
        //
    }

    /**
     * Handle the Pengajuan "restored" event.
     */
    public function restored(Pengajuan $pengajuan): void
    {
        //
    }

    /**
     * Handle the Pengajuan "force deleted" event.
     */
    public function forceDeleted(Pengajuan $pengajuan): void
    {
        //
    }
}
