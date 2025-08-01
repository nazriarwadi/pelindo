@extends('layouts.app')

@section('title', 'Dashboard')
@section('page_title', 'Dashboard')
@section('page_heading', 'Dashboard Overview')

@section('content')
    {{-- Baris untuk Kartu Statistik --}}
    {{-- Baris untuk Kartu Statistik --}}
    <div class="flex flex-wrap -mx-3">
        @php
            // Definisikan kelas yang sama untuk semua card agar konsisten
            $cardClasses = 'w-full max-w-full px-3 mb-6 md:w-1/2 md:flex-none lg:w-1/4';
        @endphp

        <div class="{{ $cardClasses }}">
            <div
                class="relative flex flex-col min-w-0 break-words bg-white shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
                <div class="flex-auto p-4">
                    <div class="flex flex-row -mx-3">
                        <div class="flex-none w-2/3 max-w-full px-3">
                            <div>
                                <p
                                    class="mb-0 font-sans text-sm font-semibold leading-normal uppercase dark:text-white dark:opacity-60">
                                    Total Pengajuan</p>
                                <h5 class="mb-2 font-bold dark:text-white">{{ $totalPengajuan }}</h5>
                                <p class="mb-0 dark:text-white dark:opacity-60"><span
                                        class="text-sm font-bold leading-normal text-blue-500">Seluruh data masuk</span></p>
                            </div>
                        </div>
                        <div class="px-3 text-right basis-1/3">
                            <div
                                class="inline-block w-12 h-12 text-center rounded-circle bg-gradient-to-tl from-blue-500 to-violet-500">
                                <i class="ni ni-collection text-lg relative top-3.5 text-white"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="{{ $cardClasses }}">
            <div
                class="relative flex flex-col min-w-0 break-words bg-white shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
                <div class="flex-auto p-4">
                    <div class="flex flex-row -mx-3">
                        <div class="flex-none w-2/3 max-w-full px-3">
                            <div>
                                <p
                                    class="mb-0 font-sans text-sm font-semibold leading-normal uppercase dark:text-white dark:opacity-60">
                                    Menunggu</p>
                                <h5 class="mb-2 font-bold dark:text-white">{{ $menungguCount }}</h5>
                                <p class="mb-0 dark:text-white dark:opacity-60"><span
                                        class="text-sm font-bold leading-normal text-orange-500">Perlu ditinjau</span></p>
                            </div>
                        </div>
                        <div class="px-3 text-right basis-1/3">
                            <div
                                class="inline-block w-12 h-12 text-center rounded-circle bg-gradient-to-tl from-orange-500 to-yellow-500">
                                <i class="ni ni-time-alarm text-lg relative top-3.5 text-white"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="{{ $cardClasses }}">
            <div
                class="relative flex flex-col min-w-0 break-words bg-white shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
                <div class="flex-auto p-4">
                    <div class="flex flex-row -mx-3">
                        <div class="flex-none w-2/3 max-w-full px-3">
                            <div>
                                <p
                                    class="mb-0 font-sans text-sm font-semibold leading-normal uppercase dark:text-white dark:opacity-60">
                                    Selesai</p>
                                <h5 class="mb-2 font-bold dark:text-white">{{ $selesaiCount }}</h5>
                                <p class="mb-0 dark:text-white dark:opacity-60"><span
                                        class="text-sm font-bold leading-normal text-emerald-500">Telah disetujui</span></p>
                            </div>
                        </div>
                        <div class="px-3 text-right basis-1/3">
                            <div
                                class="inline-block w-12 h-12 text-center rounded-circle bg-gradient-to-tl from-emerald-500 to-teal-400">
                                <i class="ni ni-check-bold text-lg relative top-3.5 text-white"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="{{ $cardClasses }}">
            <div
                class="relative flex flex-col min-w-0 break-words bg-white shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
                <div class="flex-auto p-4">
                    <div class="flex flex-row -mx-3">
                        <div class="flex-none w-2/3 max-w-full px-3">
                            <div>
                                <p
                                    class="mb-0 font-sans text-sm font-semibold leading-normal uppercase dark:text-white dark:opacity-60">
                                    Ditolak</p>
                                <h5 class="mb-2 font-bold dark:text-white">{{ $ditolakCount }}</h5>
                                <p class="mb-0 dark:text-white dark:opacity-60"><span
                                        class="text-sm font-bold leading-normal text-red-600">Tidak disetujui</span></p>
                            </div>
                        </div>
                        <div class="px-3 text-right basis-1/3">
                            <div
                                class="inline-block w-12 h-12 text-center rounded-circle bg-gradient-to-tl from-red-600 to-orange-600">
                                <i class="ni ni-fat-remove text-lg relative top-3.5 text-white"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
