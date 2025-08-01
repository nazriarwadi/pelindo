@extends('layouts.app')

@section('title', 'Data Selesai')
@section('page_title', 'Complete')
@section('page_heading', 'Data Selesai')

@section('content')
    <div class="flex flex-wrap -mx-3">
        <div class="flex-none w-full max-w-full px-3">
            <div
                class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
                <div class="p-6 pb-0 mb-0 border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                    {{-- Input pencarian dihapus dari sini --}}
                    <h6 class="dark:text-white">Tabel Seluruh Data Permohonan</h6>
                </div>
                <div class="flex-auto px-6 pt-0 pb-2">
                    <div class="p-0 overflow-x-auto">
                        {{-- ID tabel dihapus --}}
                        <table
                            class="items-center w-full mb-0 align-top border-collapse dark:border-white/40 text-slate-500">
                            <thead class="align-bottom">
                                <tr>
                                    <th
                                        class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap">
                                        No</th>
                                    <th
                                        class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap">
                                        Nama Kapal</th>
                                    <th
                                        class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap">
                                        NO PPKB</th>
                                    <th
                                        class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap">
                                        Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($permohonans as $item)
                                    <tr>
                                        <td
                                            class="px-6 py-4 text-center align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                            {{-- Logika penomoran untuk paginasi dikembalikan --}}
                                            <span
                                                class="text-xs font-semibold leading-tight text-slate-400">{{ ($permohonans->currentPage() - 1) * $permohonans->perPage() + $loop->iteration }}</span>
                                        </td>
                                        <td
                                            class="px-6 py-4 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                            <p class="mb-0 text-xs font-semibold leading-tight dark:text-white">
                                                {{ $item->pengajuan->nama_kapal }}</p>
                                        </td>
                                        <td
                                            class="px-6 py-4 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                            <p class="mb-0 text-xs font-semibold leading-tight dark:text-white">
                                                {{ $item->pengajuan->no_ppkb }}</p>
                                        </td>
                                        <td
                                            class="px-6 py-4 text-center align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                            @if ($item->status == 'menunggu')
                                                <span
                                                    class="bg-gradient-to-tl from-orange-500 to-yellow-500 px-2.5 text-xs rounded-1.8 py-1.4 inline-block whitespace-nowrap text-center align-baseline font-bold uppercase leading-none text-white">Menunggu</span>
                                            @elseif ($item->status == 'selesai')
                                                <span
                                                    class="bg-gradient-to-tl from-emerald-500 to-teal-400 px-2.5 text-xs rounded-1.8 py-1.4 inline-block whitespace-nowrap text-center align-baseline font-bold uppercase leading-none text-white">Selesai</span>
                                            @else
                                                <span
                                                    class="bg-gradient-to-tl from-red-600 to-orange-600 px-2.5 text-xs rounded-1.8 py-1.4 inline-block whitespace-nowrap text-center align-baseline font-bold uppercase leading-none text-white">Ditolak</span>
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="p-4 text-center">Tidak ada data.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    {{-- Link Paginasi Laravel ditambahkan kembali --}}
                    <div class="p-4">
                        {{ $permohonans->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
