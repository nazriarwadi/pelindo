@extends('layouts.app')

@section('title', 'Detail Permohonan')
@section('page_title', 'Permohonan Masuk')
@section('page_heading', 'Detail Permohonan')

@section('content')
    <div class="flex flex-wrap -mx-3">
        {{-- Kolom Detail --}}
        <div class="w-full lg:w-7/12 px-3 mb-6">
            <div
                class="relative flex flex-col min-w-0 break-words bg-white border-0 shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
                <div class="p-6 pb-0 mb-0 border-b-0 rounded-t-2xl">
                    <h6 class="dark:text-white">Detail Pengajuan</h6>
                </div>
                <div class="flex-auto p-6">
                    <ul class="flex flex-col pl-0 mb-0 rounded-lg">
                        <li class="relative flex p-4 mb-2 border-0 rounded-t-lg rounded-xl bg-gray-50 dark:bg-slate-800">
                            <div class="flex flex-col">
                                <span class="mb-2 text-xs leading-tight text-slate-400">NO PPKB:</span>
                                <h6 class="text-sm leading-normal dark:text-white">{{ $permohonan->pengajuan->no_ppkb }}
                                </h6>
                            </div>
                        </li>
                        <li class="relative flex p-4 mb-2 border-0 rounded-xl bg-gray-50 dark:bg-slate-800">
                            <div class="flex flex-col">
                                <span class="mb-2 text-xs leading-tight text-slate-400">Nama Kapal:</span>
                                <h6 class="text-sm leading-normal dark:text-white">{{ $permohonan->pengajuan->nama_kapal }}
                                </h6>
                            </div>
                        </li>
                        <li class="relative flex p-4 mb-2 border-0 rounded-xl bg-gray-50 dark:bg-slate-800">
                            <div class="flex flex-col">
                                <span class="mb-2 text-xs leading-tight text-slate-400">Jam Masuk / Deploy:</span>
                                <h6 class="text-sm leading-normal dark:text-white">
                                    {{ $permohonan->pengajuan->jam_masuk->format('d M Y, H:i') }} /
                                    {{ $permohonan->pengajuan->jam_deploy->format('d M Y, H:i') }}</h6>
                            </div>
                        </li>
                        <li class="relative flex p-4 border-0 rounded-b-lg rounded-xl bg-gray-50 dark:bg-slate-800">
                            <div class="flex flex-col">
                                <span class="mb-2 text-xs leading-tight text-slate-400">Keterangan:</span>
                                <h6 class="text-sm leading-normal dark:text-white">
                                    {{ $permohonan->pengajuan->keterangan_from }} ->
                                    {{ $permohonan->pengajuan->keterangan_to }}</h6>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        {{-- Kolom Aksi --}}
        <div class="w-full lg:w-5/12 px-3 mb-6">
            <div
                class="relative flex flex-col min-w-0 break-words bg-white border-0 shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
                <div class="p-6 pb-0 mb-0 border-b-0 rounded-t-2xl">
                    <h6 class="dark:text-white">Ubah Status Permohonan</h6>
                </div>
                <div class="flex-auto p-6" x-data="{ status: '{{ old('status', $permohonan->status) }}' }">
                    <form action="{{ route('permohonan.updateStatus', $permohonan->id) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <div class="mb-4">
                            <label class="block text-sm font-bold mb-2 text-slate-700">Pilih Status:</label>
                            <select name="status" x-model="status"
                                class="text-sm focus:shadow-primary-outline leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700">
                                <option value="menunggu" @if ($permohonan->status == 'menunggu') disabled @endif>Menunggu</option>
                                <option value="selesai">Selesai</option>
                                <option value="ditolak">Ditolak</option>
                            </select>
                        </div>

                        <div x-show="status === 'ditolak'" x-transition class="mb-4">
                            <label for="alasan_ditolak" class="block text-sm font-bold mb-2 text-slate-700">Alasan
                                Ditolak:</label>
                            <textarea name="alasan_ditolak" id="alasan_ditolak" rows="4"
                                class="text-sm focus:shadow-primary-outline leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700">{{ old('alasan_ditolak') }}</textarea>
                            @error('alasan_ditolak')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="flex justify-end mt-4">
                            <a href="{{ route('permohonan.index') }}"
                                class="inline-block px-6 py-3 mr-3 font-bold text-center uppercase align-middle transition-all bg-gray-200 rounded-lg cursor-pointer leading-pro text-xs ease-soft-in tracking-tight-soft shadow-soft-md bg-150 bg-x-25 hover:scale-102">Batal</a>
                            <button type="submit"
                                class="inline-block px-6 py-3 font-bold text-center text-white uppercase align-middle transition-all bg-transparent rounded-lg cursor-pointer leading-pro text-xs ease-soft-in shadow-soft-md bg-150 bg-x-25 bg-gradient-to-tl from-blue-500 to-violet-500 hover:scale-102">Update
                                Status</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
