@extends('layouts.admin')

@section('content')

<div class="min-h-screen bg-slate-100 p-4 md:p-5">

    <div class="w-full">

        {{-- =========================================================
             HEADER HALAMAN
        ========================================================== --}}

        <div class="bg-white rounded-2xl border border-slate-200
                    shadow-sm overflow-hidden mb-6">

            <div class="bg-gradient-to-r from-blue-50 via-indigo-50 to-white
                        border-b border-blue-100 px-6 py-5">

                <div class="flex flex-col md:flex-row
                            md:items-center md:justify-between gap-4">

                    {{-- JUDUL --}}

                    <div class="flex items-center gap-3">

                        <div class="w-11 h-11 rounded-xl bg-blue-100
                                    flex items-center justify-center">

                            <i class="fa-solid fa-users-gear
                                      text-blue-600 text-lg"></i>

                        </div>

                        <div>

                            <h1 class="text-2xl md:text-3xl
                                       font-bold text-slate-800">

                                Manajemen Pengguna

                            </h1>

                            <p class="text-sm text-slate-500 mt-1">

                                Kelola akun pengguna dan hak akses
                                pada sistem monitoring P3AKB.

                            </p>

                        </div>

                    </div>

                </div>

            </div>

        </div>


        {{-- =========================================================
             PESAN SUCCESS
        ========================================================== --}}

        @if(session('success'))

            <div class="mb-6 bg-emerald-50 border border-emerald-200
                        text-emerald-700 rounded-xl px-5 py-4">

                <div class="flex items-center gap-3">

                    <i class="fa-solid fa-circle-check"></i>

                    <span class="text-sm font-medium">
                        {{ session('success') }}
                    </span>

                </div>

            </div>

        @endif


        {{-- =========================================================
             PESAN ERROR
        ========================================================== --}}

        @if(session('error'))

            <div class="mb-6 bg-red-50 border border-red-200
                        text-red-700 rounded-xl px-5 py-4">

                <div class="flex items-center gap-3">

                    <i class="fa-solid fa-circle-exclamation"></i>

                    <span class="text-sm font-medium">
                        {{ session('error') }}
                    </span>

                </div>

            </div>

        @endif


        {{-- =========================================================
             DAFTAR PENGGUNA
        ========================================================== --}}

        <div class="bg-white rounded-2xl
                    shadow-sm border border-slate-200
                    overflow-hidden">


            {{-- =====================================================
                 HEADER CARD
            ====================================================== --}}

            <div class="bg-gradient-to-r from-blue-50 via-indigo-50 to-white
                        border-b border-blue-100
                        px-6 py-5">

                <div class="flex flex-col md:flex-row
                            md:items-center md:justify-between gap-4">

                    {{-- JUDUL SECTION --}}

                    <div class="flex items-center gap-3">

                        <div class="w-10 h-10 rounded-xl
                                    bg-blue-100
                                    flex items-center justify-center">

                            <i class="fa-solid fa-user-group
                                      text-blue-600"></i>

                        </div>

                        <div>

                            <h2 class="text-lg font-bold text-slate-800">

                                Daftar Pengguna

                            </h2>

                            <p class="text-sm text-slate-500 mt-1">

                                Daftar akun yang terdaftar pada sistem.

                            </p>

                        </div>

                    </div>


                    {{-- =================================================
                         TAMBAH PENGGUNA
                    ================================================== --}}

                    <a
                        href="{{ route('admin.pengguna.create') }}"
                        class="inline-flex items-center justify-center
                               gap-2
                               bg-blue-600 hover:bg-blue-700
                               text-white text-sm font-semibold
                               px-5 py-2.5
                               rounded-lg
                               shadow-sm
                               transition
                               w-full md:w-auto">

                        <i class="fa-solid fa-plus text-xs"></i>

                        Tambah Pengguna

                    </a>

                </div>

            </div>


            {{-- =====================================================
                 TABEL
            ====================================================== --}}

            <div class="p-5">

                <div class="overflow-x-auto
                            border border-slate-200
                            rounded-xl">

                    <table class="w-full min-w-[1050px]">

                        {{-- =================================================
                             TABLE HEADER
                        ================================================== --}}

                        <thead>

                            <tr class="bg-slate-50
                                       border-b border-slate-200">

                                <th class="px-5 py-4
                                           text-left
                                           text-xs font-bold
                                           text-slate-600
                                           uppercase
                                           tracking-wide
                                           w-20">

                                    No

                                </th>


                                <th class="px-5 py-4
                                           text-left
                                           text-xs font-bold
                                           text-slate-600
                                           uppercase
                                           tracking-wide">

                                    Pengguna

                                </th>


                                <th class="px-5 py-4
                                           text-left
                                           text-xs font-bold
                                           text-slate-600
                                           uppercase
                                           tracking-wide">

                                    Email

                                </th>


                                <th class="px-5 py-4
                                           text-left
                                           text-xs font-bold
                                           text-slate-600
                                           uppercase
                                           tracking-wide
                                           w-40">

                                    Role

                                </th>


                                <th class="px-5 py-4
                                           text-left
                                           text-xs font-bold
                                           text-slate-600
                                           uppercase
                                           tracking-wide
                                           w-36">

                                    Status

                                </th>


                                <th class="px-5 py-4
                                           text-left
                                           text-xs font-bold
                                           text-slate-600
                                           uppercase
                                           tracking-wide
                                           w-44">

                                    Aksi

                                </th>

                            </tr>

                        </thead>


                        {{-- =================================================
                             TABLE BODY
                        ================================================== --}}

                        <tbody class="divide-y divide-slate-100">

                            @forelse($users as $user)

                                <tr class="hover:bg-blue-50/40
                                           transition">


                                    {{-- NO --}}

                                    <td class="px-5 py-4">

                                        <span class="inline-flex items-center
                                                     justify-center
                                                     w-8 h-8
                                                     rounded-lg
                                                     bg-slate-100
                                                     text-slate-600
                                                     text-xs
                                                     font-semibold">

                                            {{ $loop->iteration }}

                                        </span>

                                    </td>


                                    {{-- PENGGUNA --}}

                                    <td class="px-5 py-4">

                                        <div class="flex items-center gap-3">

                                            <div class="w-10 h-10
                                                        rounded-xl
                                                        bg-blue-100
                                                        flex items-center
                                                        justify-center
                                                        flex-shrink-0">

                                                <i class="fa-solid fa-user
                                                          text-blue-600"></i>

                                            </div>


                                            <div class="min-w-0">

                                                <div class="font-semibold
                                                            text-slate-800">

                                                    {{ $user->name }}

                                                </div>

                                                <div class="text-xs
                                                            text-slate-400
                                                            mt-0.5">

                                                    ID Pengguna #{{ $user->id }}

                                                </div>

                                            </div>

                                        </div>

                                    </td>


                                    {{-- EMAIL --}}

                                    <td class="px-5 py-4">

                                        <div class="flex items-center gap-2">

                                            <div class="w-8 h-8
                                                        rounded-lg
                                                        bg-slate-100
                                                        flex items-center
                                                        justify-center">

                                                <i class="fa-solid fa-envelope
                                                          text-slate-500
                                                          text-xs"></i>

                                            </div>

                                            <span class="text-sm
                                                         text-slate-600">

                                                {{ $user->email }}

                                            </span>

                                        </div>

                                    </td>


                                    {{-- ROLE --}}

                                    <td class="px-5 py-4">

                                        @if($user->role === 'admin')

                                            <span class="inline-flex
                                                         items-center gap-2
                                                         px-3 py-1.5
                                                         rounded-full
                                                         bg-indigo-50
                                                         border border-indigo-100
                                                         text-indigo-700
                                                         text-xs font-semibold">

                                                <span class="w-1.5 h-1.5
                                                             rounded-full
                                                             bg-indigo-500">
                                                </span>

                                                Admin

                                            </span>

                                        @elseif($user->role === 'operator')

                                            <span class="inline-flex
                                                         items-center gap-2
                                                         px-3 py-1.5
                                                         rounded-full
                                                         bg-emerald-50
                                                         border border-emerald-100
                                                         text-emerald-700
                                                         text-xs font-semibold">

                                                <span class="w-1.5 h-1.5
                                                             rounded-full
                                                             bg-emerald-500">
                                                </span>

                                                Operator

                                            </span>

                                        @else

                                            <span class="inline-flex
                                                         items-center gap-2
                                                         px-3 py-1.5
                                                         rounded-full
                                                         bg-blue-50
                                                         border border-blue-100
                                                         text-blue-700
                                                         text-xs font-semibold">

                                                <span class="w-1.5 h-1.5
                                                             rounded-full
                                                             bg-blue-500">
                                                </span>

                                                User

                                            </span>

                                        @endif

                                    </td>


                                    {{-- STATUS --}}

                                    <td class="px-5 py-4">

                                        <span class="inline-flex
                                                     items-center gap-2
                                                     px-3 py-1.5
                                                     rounded-full
                                                     bg-emerald-50
                                                     border border-emerald-100
                                                     text-emerald-700
                                                     text-xs font-semibold">

                                            <span class="w-1.5 h-1.5
                                                         rounded-full
                                                         bg-emerald-500">
                                            </span>

                                            Aktif

                                        </span>

                                    </td>


                                    {{-- =================================================
                                         AKSI
                                    ================================================== --}}

                                    <td class="px-5 py-4">

                                        <div class="flex items-center gap-2">

                                            {{-- EDIT --}}

                                            <a
                                                href="{{ route('admin.pengguna.edit', $user->id) }}"
                                                class="inline-flex items-center
                                                       gap-1.5
                                                       px-3 py-2
                                                       rounded-lg
                                                       bg-blue-600
                                                       hover:bg-blue-700
                                                       text-white
                                                       text-xs
                                                       font-semibold
                                                       transition">

                                                <i class="fa-solid fa-pen-to-square"></i>

                                                Edit

                                            </a>


                                            {{-- HAPUS --}}

                                            @if(auth()->id() != $user->id)

                                                <form
                                                    action="{{ route('admin.pengguna.destroy', $user->id) }}"
                                                    method="POST"
                                                    onsubmit="return confirm('Apakah Anda yakin ingin menghapus pengguna ini?');">

                                                    @csrf

                                                    @method('DELETE')

                                                    <button
                                                        type="submit"
                                                        class="inline-flex items-center
                                                               gap-1.5
                                                               px-3 py-2
                                                               rounded-lg
                                                               bg-slate-600
                                                               hover:bg-red-600
                                                               text-white
                                                               text-xs
                                                               font-semibold
                                                               transition">

                                                        <i class="fa-solid fa-trash"></i>

                                                        Hapus

                                                    </button>

                                                </form>

                                            @else

                                                <span
                                                    class="inline-flex items-center
                                                           gap-1.5
                                                           px-3 py-2
                                                           rounded-lg
                                                           bg-slate-100
                                                           text-slate-400
                                                           text-xs
                                                           font-semibold">

                                                    <i class="fa-solid fa-lock"></i>

                                                    Akun Aktif

                                                </span>

                                            @endif

                                        </div>

                                    </td>

                                </tr>

                            @empty

                                {{-- EMPTY STATE --}}

                                <tr>

                                    <td colspan="6"
                                        class="px-6 py-14 text-center">

                                        <div class="flex flex-col
                                                    items-center
                                                    justify-center">

                                            <div class="w-16 h-16
                                                        rounded-2xl
                                                        bg-blue-50
                                                        border border-blue-100
                                                        flex items-center
                                                        justify-center
                                                        mb-4">

                                                <i class="fa-solid fa-users
                                                          text-blue-500
                                                          text-2xl"></i>

                                            </div>

                                            <p class="font-semibold
                                                      text-slate-700">

                                                Belum Ada Pengguna

                                            </p>

                                            <p class="text-sm
                                                      text-slate-400
                                                      mt-1">

                                                Data pengguna belum tersedia
                                                pada sistem.

                                            </p>

                                        </div>

                                    </td>

                                </tr>

                            @endforelse

                        </tbody>

                    </table>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection