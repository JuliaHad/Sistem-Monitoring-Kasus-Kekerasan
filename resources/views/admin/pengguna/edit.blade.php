@extends('layouts.admin')

@section('content')

<div class="min-h-screen bg-slate-100 p-4 md:p-5">

    <div class="w-full max-w-5xl mx-auto">

        {{-- =========================================================
             HEADER
        ========================================================== --}}

        <div class="bg-white rounded-2xl border border-slate-200
                    shadow-sm overflow-hidden mb-6">

            <div class="bg-gradient-to-r from-blue-50 via-indigo-50 to-white
                        border-b border-blue-100 px-6 py-5">

                <div class="flex items-center gap-3">

                    <div class="w-11 h-11 rounded-xl
                                bg-blue-100
                                flex items-center justify-center">

                        <i class="fa-solid fa-user-pen
                                  text-blue-600 text-lg"></i>

                    </div>

                    <div>

                        <h1 class="text-2xl md:text-3xl
                                   font-bold text-slate-800">

                            Edit Pengguna

                        </h1>

                        <p class="text-sm text-slate-500 mt-1">

                            Perbarui data akun dan hak akses pengguna.

                        </p>

                    </div>

                </div>

            </div>

        </div>


        {{-- =========================================================
             VALIDATION ERROR
        ========================================================== --}}

        @if($errors->any())

            <div class="mb-6 bg-red-50 border border-red-200
                        text-red-700 rounded-xl px-5 py-4">

                <div class="flex items-start gap-3">

                    <i class="fa-solid fa-circle-exclamation mt-0.5"></i>

                    <div>

                        <p class="font-semibold text-sm mb-1">
                            Terdapat kesalahan pada data:
                        </p>

                        <ul class="text-sm list-disc ml-5 space-y-1">

                            @foreach($errors->all() as $error)

                                <li>{{ $error }}</li>

                            @endforeach

                        </ul>

                    </div>

                </div>

            </div>

        @endif


        {{-- =========================================================
             FORM EDIT
        ========================================================== --}}

        <div class="bg-white rounded-2xl
                    border border-slate-200
                    shadow-sm overflow-hidden">

            <div class="bg-gradient-to-r from-blue-50 via-indigo-50 to-white
                        border-b border-blue-100
                        px-6 py-5">

                <div class="flex items-center gap-3">

                    <div class="w-10 h-10 rounded-xl
                                bg-blue-100
                                flex items-center
                                justify-center">

                        <i class="fa-solid fa-user
                                  text-blue-600"></i>

                    </div>

                    <div>

                        <h2 class="text-lg font-bold text-slate-800">

                            Informasi Pengguna

                        </h2>

                        <p class="text-sm text-slate-500 mt-1">

                            ID Pengguna #{{ $user->id }}

                        </p>

                    </div>

                </div>

            </div>


            <form
                action="{{ route('admin.pengguna.update', $user->id) }}"
                method="POST"
                class="p-6">

                @csrf

                @method('PUT')


                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">


                    {{-- NAMA --}}

                    <div>

                        <label
                            for="name"
                            class="block text-sm font-semibold
                                   text-slate-700 mb-2">

                            Nama Lengkap

                        </label>

                        <input
                            type="text"
                            id="name"
                            name="name"
                            value="{{ old('name', $user->name) }}"
                            required
                            class="w-full rounded-lg
                                   border border-slate-300
                                   px-4 py-3
                                   text-sm
                                   text-slate-700
                                   focus:outline-none
                                   focus:ring-2
                                   focus:ring-blue-500
                                   focus:border-blue-500">

                    </div>


                    {{-- EMAIL --}}

                    <div>

                        <label
                            for="email"
                            class="block text-sm font-semibold
                                   text-slate-700 mb-2">

                            Email

                        </label>

                        <input
                            type="email"
                            id="email"
                            name="email"
                            value="{{ old('email', $user->email) }}"
                            required
                            class="w-full rounded-lg
                                   border border-slate-300
                                   px-4 py-3
                                   text-sm
                                   text-slate-700
                                   focus:outline-none
                                   focus:ring-2
                                   focus:ring-blue-500
                                   focus:border-blue-500">

                    </div>


                    {{-- ROLE --}}

                    <div>

                        <label
                            for="role"
                            class="block text-sm font-semibold
                                   text-slate-700 mb-2">

                            Role

                        </label>

                        <select
                            id="role"
                            name="role"
                            required
                            class="w-full rounded-lg
                                   border border-slate-300
                                   px-4 py-3
                                   text-sm
                                   text-slate-700
                                   bg-white
                                   focus:outline-none
                                   focus:ring-2
                                   focus:ring-blue-500
                                   focus:border-blue-500">

                            <option
                                value="user"
                                {{ old('role', $user->role) === 'user' ? 'selected' : '' }}>

                                User

                            </option>

                            <option
                                value="operator"
                                {{ old('role', $user->role) === 'operator' ? 'selected' : '' }}>

                                Operator

                            </option>

                            <option
                                value="admin"
                                {{ old('role', $user->role) === 'admin' ? 'selected' : '' }}>

                                Admin

                            </option>

                        </select>

                    </div>


                    {{-- PASSWORD --}}

                    <div>

                        <label
                            for="password"
                            class="block text-sm font-semibold
                                   text-slate-700 mb-2">

                            Password Baru

                        </label>

                        <input
                            type="password"
                            id="password"
                            name="password"
                            minlength="8"
                            placeholder="Kosongkan jika tidak diubah"
                            class="w-full rounded-lg
                                   border border-slate-300
                                   px-4 py-3
                                   text-sm
                                   text-slate-700
                                   focus:outline-none
                                   focus:ring-2
                                   focus:ring-blue-500
                                   focus:border-blue-500">

                        <p class="text-xs text-slate-400 mt-2">

                            Minimal 8 karakter. Kosongkan jika password
                            tidak ingin diubah.

                        </p>

                    </div>

                </div>


                {{-- =================================================
                     TOMBOL
                ================================================== --}}

                <div class="flex flex-col sm:flex-row
                            items-center justify-end
                            gap-3
                            mt-8
                            pt-6
                            border-t border-slate-200">

                    <a
                        href="{{ route('admin.pengguna') }}"
                        class="w-full sm:w-auto
                               inline-flex items-center
                               justify-center
                               gap-2
                               px-5 py-2.5
                               rounded-lg
                               bg-slate-100
                               hover:bg-slate-200
                               text-slate-700
                               text-sm font-semibold
                               transition">

                        <i class="fa-solid fa-arrow-left"></i>

                        Kembali

                    </a>


                    <button
                        type="submit"
                        class="w-full sm:w-auto
                               inline-flex items-center
                               justify-center
                               gap-2
                               px-5 py-2.5
                               rounded-lg
                               bg-blue-600
                               hover:bg-blue-700
                               text-white
                               text-sm font-semibold
                               shadow-sm
                               transition">

                        <i class="fa-solid fa-floppy-disk"></i>

                        Simpan Perubahan

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection