@extends('layouts.app')

@section('title', 'Buat Pengajuan Baru')
@section('page_title', 'Pengajuan')
@section('page_heading', 'Buat Pengajuan Baru')

@section('content')
    <div class="flex flex-wrap -mx-3">
        <div class="flex-none w-full max-w-full px-3">
            <div
                class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
                <div class="p-6 pb-0 mb-0 border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                    <h6 class="dark:text-white">Formulir Pengajuan</h6>
                </div>
                <div class="flex-auto px-0 pt-0 pb-2">
                    <div class="p-6">
                        <form action="{{ route('pengajuan.store') }}" method="POST">
                            @csrf
                            <div class="flex flex-wrap -mx-3">
                                {{-- NO PPKB --}}
                                <div class="w-full md:w-1/2 px-3 mb-6">
                                    <label for="no_ppkb"
                                        class="block uppercase tracking-wide text-slate-700 dark:text-white text-xs font-bold mb-2">
                                        NO PPKB
                                    </label>
                                    <input type="text" id="no_ppkb" name="no_ppkb" value="{{ old('no_ppkb') }}"
                                        class="text-sm focus:shadow-primary-outline leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-blue-500 focus:bg-white focus:text-gray-700 focus:outline-none"
                                        required>
                                    @error('no_ppkb')
                                        <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                                    @enderror
                                </div>
                                {{-- Nama Kapal --}}
                                <div class="w-full md:w-1/2 px-3 mb-6">
                                    <label for="nama_kapal"
                                        class="block uppercase tracking-wide text-slate-700 dark:text-white text-xs font-bold mb-2">
                                        Nama Kapal
                                    </label>
                                    <input type="text" id="nama_kapal" name="nama_kapal" value="{{ old('nama_kapal') }}"
                                        class="text-sm focus:shadow-primary-outline leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-blue-500 focus:bg-white focus:text-gray-700 focus:outline-none"
                                        required>
                                    @error('nama_kapal')
                                        <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                                    @enderror
                                </div>
                                {{-- Jam Masuk --}}
                                <div class="w-full md:w-1/2 px-3 mb-6">
                                    <label for="jam_masuk"
                                        class="block uppercase tracking-wide text-slate-700 dark:text-white text-xs font-bold mb-2">
                                        Jam Masuk
                                    </label>
                                    <input type="datetime-local" id="jam_masuk" name="jam_masuk"
                                        value="{{ old('jam_masuk') }}"
                                        class="text-sm focus:shadow-primary-outline leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-blue-500 focus:bg-white focus:text-gray-700 focus:outline-none"
                                        required>
                                    @error('jam_masuk')
                                        <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                                    @enderror
                                </div>
                                {{-- Jam Deploy --}}
                                <div class="w-full md:w-1/2 px-3 mb-6">
                                    <label for="jam_deploy"
                                        class="block uppercase tracking-wide text-slate-700 dark:text-white text-xs font-bold mb-2">
                                        Jam Deploy
                                    </label>
                                    <input type="datetime-local" id="jam_deploy" name="jam_deploy"
                                        value="{{ old('jam_deploy') }}"
                                        class="text-sm focus:shadow-primary-outline leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-blue-500 focus:bg-white focus:text-gray-700 focus:outline-none"
                                        required>
                                    @error('jam_deploy')
                                        <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                                    @enderror
                                </div>
                                {{-- Keterangan From --}}
                                <div class="w-full md:w-1/2 px-3 mb-6">
                                    <label for="keterangan_from"
                                        class="block uppercase tracking-wide text-slate-700 dark:text-white text-xs font-bold mb-2">
                                        Keterangan (From)
                                    </label>
                                    <input type="text" id="keterangan_from" name="keterangan_from"
                                        placeholder="e.g., Dermaga A" value="{{ old('keterangan_from') }}"
                                        class="text-sm focus:shadow-primary-outline leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-blue-500 focus:bg-white focus:text-gray-700 focus:outline-none"
                                        required>
                                    @error('keterangan_from')
                                        <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                                    @enderror
                                </div>
                                {{-- Keterangan To --}}
                                <div class="w-full md:w-1/2 px-3 mb-6">
                                    <label for="keterangan_to"
                                        class="block uppercase tracking-wide text-slate-700 dark:text-white text-xs font-bold mb-2">
                                        Keterangan (To)
                                    </label>
                                    <input type="text" id="keterangan_to" name="keterangan_to"
                                        placeholder="e.g., Dermaga B" value="{{ old('keterangan_to') }}"
                                        class="text-sm focus:shadow-primary-outline leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-blue-500 focus:bg-white focus:text-gray-700 focus:outline-none"
                                        required>
                                    @error('keterangan_to')
                                        <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            {{-- Tombol Aksi --}}
                            <div class="flex justify-end gap-4 mt-4">
                                <a href="{{ route('pengajuan.index') }}"
                                    class="inline-block px-6 py-3 font-bold text-center uppercase align-middle transition-all bg-gray-200 rounded-lg cursor-pointer leading-pro text-xs ease-soft-in tracking-tight-soft shadow-soft-md bg-150 bg-x-25 hover:scale-102 active:opacity-85 hover:shadow-soft-xs">
                                    Batal
                                </a>
                                <button type="submit"
                                    class="inline-block px-6 py-3 font-bold text-center text-white uppercase align-middle transition-all bg-transparent rounded-lg cursor-pointer leading-pro text-xs ease-soft-in shadow-soft-md bg-150 bg-x-25 bg-gradient-to-tl from-blue-500 to-violet-500 hover:scale-102 hover:shadow-soft-xs active:opacity-85">
                                    Simpan
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
