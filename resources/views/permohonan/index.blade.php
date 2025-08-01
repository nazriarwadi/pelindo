@extends('layouts.app')

@section('title', 'Permohonan Masuk')
@section('page_title', 'Permohonan Masuk')
@section('page_heading', 'Daftar Permohonan Masuk')

@section('content')
    <div class="flex flex-wrap -mx-3">
        <div class="flex-none w-full max-w-full px-3">
            <div
                class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
                <div class="p-6 pb-0 mb-0 border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                    <h6 class="dark:text-white">Tabel Permohonan</h6>
                </div>
                <div class="flex-auto px-0 pt-0 pb-2">
                    @if (session('success'))
                        <div class="px-6 pt-4" x-data="{ show: true }" x-init="setTimeout(() => show = false, 3000)" x-show="show">
                            <div class="relative w-full p-4 text-white bg-gradient-to-tl from-green-600 to-lime-400 rounded-xl"
                                role="alert">
                                {{ session('success') }}
                            </div>
                        </div>
                    @endif
                    <div class="p-0 overflow-x-auto">
                        <table
                            class="items-center w-full mb-0 align-top border-collapse dark:border-white/40 text-slate-500">
                            <thead class="align-bottom">
                                <tr>
                                    <th
                                        class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap">
                                        No</th>
                                    <th
                                        class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap">
                                        NO PPKB</th>
                                    <th
                                        class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap">
                                        Nama Kapal</th>
                                    <th
                                        class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap">
                                        Tanggal Diajukan</th>
                                    <th
                                        class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap">
                                        Status</th>
                                    <th
                                        class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap">
                                        Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($permohonans as $item)
                                    <tr>
                                        <td
                                            class="px-6 py-4 text-center align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                            <span
                                                class="text-xs font-semibold leading-tight text-slate-400">{{ ($permohonans->currentPage() - 1) * $permohonans->perPage() + $loop->iteration }}</span>
                                        </td>
                                        <td
                                            class="px-6 py-4 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                            <p class="mb-0 text-xs font-semibold leading-tight dark:text-white">
                                                {{ $item->pengajuan->no_ppkb }}</p>
                                        </td>
                                        <td
                                            class="px-6 py-4 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                            <p class="mb-0 text-xs font-semibold leading-tight dark:text-white">
                                                {{ $item->pengajuan->nama_kapal }}</p>
                                        </td>
                                        <td
                                            class="px-6 py-4 text-center align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                            <span
                                                class="text-xs font-semibold leading-tight text-slate-400">{{ $item->created_at->format('d M Y, H:i') }}</span>
                                        </td>
                                        <td
                                            class="p-2 text-sm leading-normal text-center align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                            @if ($item->status == 'menunggu')
                                                {{-- Status Menunggu (Warning) --}}
                                                <span
                                                    class="bg-gradient-to-tl from-orange-500 to-yellow-500 px-2.5 text-xs rounded-1.8 py-1.4 inline-block whitespace-nowrap text-center align-baseline font-bold uppercase leading-none text-white">Menunggu</span>
                                            @elseif ($item->status == 'selesai')
                                                {{-- Status Selesai (Success) --}}
                                                <span
                                                    class="bg-gradient-to-tl from-emerald-500 to-teal-400 px-2.5 text-xs rounded-1.8 py-1.4 inline-block whitespace-nowrap text-center align-baseline font-bold uppercase leading-none text-white">Selesai</span>
                                            @elseif ($item->status == 'ditolak')
                                                {{-- Status Ditolak (Danger) --}}
                                                <span
                                                    class="bg-gradient-to-tl from-red-600 to-orange-600 px-2.5 text-xs rounded-1.8 py-1.4 inline-block whitespace-nowrap text-center align-baseline font-bold uppercase leading-none text-white">Ditolak</span>
                                            @else
                                                {{-- Status Lainnya (Default/Info) --}}
                                                <span
                                                    class="bg-gradient-to-tl from-slate-600 to-slate-300 px-2.5 text-xs rounded-1.8 py-1.4 inline-block whitespace-nowrap text-center align-baseline font-bold uppercase leading-none text-white">{{ ucfirst($item->status ?? 'Tidak Diketahui') }}</span>
                                            @endif
                                        </td>
                                        <td
                                            class="px-6 py-4 text-center align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                            <a href="{{ route('permohonan.show', $item->id) }}"
                                                class="text-xs font-semibold leading-tight text-slate-400">Lihat Detail</a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="p-4 text-center">Tidak ada permohonan masuk.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="p-4">{{ $permohonans->links() }}</div>
                </div>
            </div>
        </div>
    </div>
@endsection
