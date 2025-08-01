@extends('layouts.sign-up') {{-- Menggunakan layout master sign-up.blade.php --}}

@section('title', 'Register - Pelindo') {{-- Mengatur judul halaman --}}

@section('content') {{-- Konten yang spesifik untuk halaman register --}}
    <section class="min-h-screen">
        <div class="bg-top relative flex items-start pt-12 pb-56 m-4 overflow-hidden bg-cover min-h-50-screen rounded-xl"
            style="background-image: url('{{ asset('assets/img/registrasi.png') }}');">
            <span
                class="absolute top-0 left-0 w-full h-full bg-center bg-cover bg-gradient-to-tl from-zinc-800 to-zinc-700 opacity-60"></span>
            <div class="container z-10">
                <div class="flex flex-wrap justify-center -mx-3">
                    <div class="w-full max-w-full px-3 mx-auto mt-0 text-center lg:flex-0 shrink-0 lg:w-5/12">
                        <h1 class="mt-12 mb-2 text-white">Welcome!</h1>
                        <p class="text-white">Use these awesome forms to login or create new account in your project
                            for free.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="flex flex-wrap -mx-3 -mt-48 md:-mt-56 lg:-mt-48">
                <div class="w-full max-w-full px-3 mx-auto mt-0 md:flex-0 shrink-0 md:w-7/12 lg:w-5/12 xl:w-4/12">
                    <div
                        class="relative z-0 flex flex-col min-w-0 break-words bg-white border-0 shadow-xl rounded-2xl bg-clip-border">
                        <div class="p-6 mb-0 text-center bg-white border-b-0 rounded-t-2xl">
                            <h5>Register</h5>
                        </div>
                        <div class="flex flex-wrap px-3 -mx-3 sm:px-6 xl:px-12">
                        </div>
                        <div class="flex-auto p-6">
                            {{-- Form Registrasi Laravel --}}
                            <form role="form" method="POST" action="{{ url('/register') }}">
                                @csrf {{-- Penting untuk keamanan Laravel --}}

                                {{-- Input Nama --}}
                                <div class="mb-4">
                                    <input type="text" name="name" value="{{ old('name') }}" required autofocus
                                        autocomplete="name"
                                        class="placeholder:text-gray-500 text-sm focus:shadow-primary-outline leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-blue-500 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow"
                                        placeholder="Username" aria-label="Username" aria-describedby="email-addon" />
                                    @error('name')
                                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                {{-- Input Email --}}
                                <div class="mb-4">
                                    <input type="email" name="email" value="{{ old('email') }}" required
                                        autocomplete="username"
                                        class="placeholder:text-gray-500 text-sm focus:shadow-primary-outline leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-blue-500 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow"
                                        placeholder="Email" aria-label="Email" aria-describedby="email-addon" />
                                    @error('email')
                                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                {{-- Input Password --}}
                                <div class="mb-4">
                                    <input type="password" name="password" required autocomplete="new-password"
                                        class="placeholder:text-gray-500 text-sm focus:shadow-primary-outline leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-blue-500 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow"
                                        placeholder="Password" aria-label="Password" aria-describedby="password-addon" />
                                    @error('password')
                                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                {{-- Input Konfirmasi Password --}}
                                <div class="mb-4">
                                    <input type="password" name="password_confirmation" required autocomplete="new-password"
                                        class="placeholder:text-gray-500 text-sm focus:shadow-primary-outline leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-blue-500 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow"
                                        placeholder="Konfirmasi Password" aria-label="Password Confirmation"
                                        aria-describedby="password-confirmation-addon" />
                                </div>

                                {{-- Pilih Role --}}
                                <div class="mb-4">
                                    {{-- Container untuk radio buttons --}}
                                    <div class="flex items-center gap-8">
                                        <div class="flex items-center">
                                            <input type="radio" name="role" id="role_pakning" value="pelindo_pakning"
                                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500"
                                                {{ old('role', 'pelindo_pakning') == 'pelindo_pakning' ? 'checked' : '' }}>
                                            <label for="role_pakning" class="ml-2 text-sm font-medium text-slate-700">
                                                PELINDO PAKNING
                                            </label>
                                        </div>

                                        <div class="flex items-center">
                                            <input type="radio" name="role" id="role_dumai" value="pelindo_dumai"
                                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500"
                                                {{ old('role') == 'pelindo_dumai' ? 'checked' : '' }}>
                                            <label for="role_dumai" class="ml-2 text-sm font-medium text-slate-700">
                                                PELINDO DUMAI
                                            </label>
                                        </div>
                                    </div>

                                    {{-- Menampilkan pesan error jika validasi gagal --}}
                                    @error('role')
                                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="text-center">
                                    <button type="submit"
                                        class="inline-block w-full px-5 py-2.5 mt-6 mb-2 font-bold text-center text-white align-middle transition-all bg-transparent border-0 rounded-lg cursor-pointer active:opacity-85 hover:-translate-y-px hover:shadow-xs leading-normal text-sm ease-in tracking-tight-rem shadow-md bg-150 bg-x-25 bg-gradient-to-tl from-zinc-800 to-zinc-700 hover:border-slate-700 hover:bg-slate-700 hover:text-white">Sign
                                        up</button>
                                </div>
                                <p class="mt-4 mb-0 leading-normal text-sm">Already have an account? <a
                                        href="{{ route('login') }}" class="font-bold text-slate-700">Sign in</a>
                                    {{-- Ganti dengan route login Anda --}}
                                </p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection {{-- Akhir dari section content --}}
