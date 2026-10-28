@extends('layouts.admin')

@section('content')

<div class="space-y-6">

    {{-- =========================================================
        HEADER
    ========================================================== --}}
    <div class="bg-white rounded-2xl shadow-sm
                border border-slate-200 overflow-hidden">

        <div class="px-6 py-5
                    bg-gradient-to-r from-blue-50 via-indigo-50 to-blue-50
                    border-b border-blue-100">

            <div class="flex flex-col xl:flex-row
                        xl:items-center xl:justify-between gap-5">

                {{-- JUDUL --}}
                <div class="flex items-center gap-4">

                    <div class="w-12 h-12 rounded-xl
                                bg-blue-100
                                flex items-center justify-center">

                        <i class="fa-solid fa-database
                                  text-blue-700 text-xl"></i>

                    </div>

                    <div>

                        <h1 class="text-2xl font-bold text-slate-800">
                            Data Kasus
                        </h1>

                        <p class="text-sm text-slate-500 mt-1">
                            Kelola dan pantau data kasus kekerasan terhadap
                            perempuan dan anak.
                        </p>

                    </div>

                </div>


                {{-- TOMBOL AKSI --}}
                <div class="flex flex-wrap items-center gap-2">

                    {{-- EXPORT PDF --}}
                    <a href="{{ route('export.kasus', ['tahun' => request('tahun')]) }}"
                       class="inline-flex items-center gap-2
                              bg-blue-800 hover:bg-blue-900
                              text-white px-4 py-2.5
                              rounded-lg text-sm font-semibold
                              shadow-sm transition">

                        <i class="fa-solid fa-file-pdf"></i>

                        Export PDF

                    </a>


                    {{-- EXPORT EXCEL --}}
                    <a href="{{ route('export.kasus.excel', ['tahun' => request('tahun')]) }}"
                       class="inline-flex items-center gap-2
                              bg-blue-600 hover:bg-blue-700
                              text-white px-4 py-2.5
                              rounded-lg text-sm font-semibold
                              shadow-sm transition">

                        <i class="fa-solid fa-file-excel"></i>

                        Export Excel

                    </a>


                    {{-- IMPORT EXCEL --}}
                    <form action="{{ route('kasus.import') }}"
                          method="POST"
                          enctype="multipart/form-data"
                          class="flex items-center gap-2">

                        @csrf

                        <label
                            class="relative inline-flex items-center
                                   cursor-pointer">

                            <input
                                type="file"
                                name="file"
                                class="absolute inset-0 w-full h-full
                                       opacity-0 cursor-pointer"
                                required>

                            <span
                                class="inline-flex items-center gap-2
                                       bg-slate-100 hover:bg-slate-200
                                       border border-slate-300
                                       text-slate-700
                                       px-4 py-2.5
                                       rounded-lg text-sm font-semibold
                                       transition">

                                <i class="fa-solid fa-folder-open
                                          text-blue-700"></i>

                                Pilih File

                            </span>

                        </label>


                        <button
                            type="submit"
                            class="inline-flex items-center gap-2
                                   bg-indigo-600 hover:bg-indigo-700
                                   text-white px-4 py-2.5
                                   rounded-lg text-sm font-semibold
                                   shadow-sm transition">

                            <i class="fa-solid fa-file-import"></i>

                            Import Excel

                        </button>

                    </form>


                    {{-- TAMBAH DATA --}}
                    <a href="{{ route('kasus.create') }}"
                       class="inline-flex items-center gap-2
                              bg-blue-600 hover:bg-blue-700
                              text-white px-4 py-2.5
                              rounded-lg text-sm font-semibold
                              shadow-sm transition">

                        <i class="fa-solid fa-plus"></i>

                        Tambah Data

                    </a>

                </div>

            </div>

        </div>


        {{-- =====================================================
            PESAN SUCCESS
        ====================================================== --}}
        @if(session('success'))

            <div class="px-6 pt-5">

                <div class="flex items-center gap-3
                            bg-blue-50
                            border border-blue-200
                            text-blue-800
                            px-4 py-3
                            rounded-xl">

                    <div class="w-8 h-8 rounded-lg
                                bg-blue-100
                                flex items-center justify-center">

                        <i class="fa-solid fa-circle-check
                                  text-blue-600"></i>

                    </div>

                    <div>

                        <p class="text-sm font-semibold">
                            Berhasil
                        </p>

                        <p class="text-sm text-blue-700">
                            {{ session('success') }}
                        </p>

                    </div>

                </div>

            </div>

        @endif


        {{-- =====================================================
            FILTER
        ====================================================== --}}
        <div class="px-6 py-5">

            <form method="GET">

                <div class="flex flex-wrap items-end gap-3">

                    <div>

                        <label
                            class="block text-xs font-semibold
                                   text-slate-500 mb-1.5">

                            Filter Tahun

                        </label>

                        <select
                            name="tahun"
                            class="min-w-[170px]
                                   bg-white
                                   border border-slate-300
                                   rounded-lg
                                   px-4 py-2.5
                                   text-sm text-slate-700
                                   shadow-sm
                                   focus:outline-none
                                   focus:ring-2
                                   focus:ring-blue-500
                                   focus:border-blue-500">

                            <option value="">
                                Semua Tahun
                            </option>

                            @for($tahun = date('Y'); $tahun >= 2020; $tahun--)

                                <option
                                    value="{{ $tahun }}"
                                    {{ request('tahun') == $tahun ? 'selected' : '' }}>

                                    {{ $tahun }}

                                </option>

                            @endfor

                        </select>

                    </div>


                    <button
                        type="submit"
                        class="inline-flex items-center gap-2
                               bg-blue-600 hover:bg-blue-700
                               text-white
                               px-5 py-2.5
                               rounded-lg
                               text-sm font-semibold
                               shadow-sm
                               transition">

                        <i class="fa-solid fa-filter"></i>

                        Filter

                    </button>


                    <a href="{{ route('kasus.index') }}"
                       class="inline-flex items-center gap-2
                              bg-slate-500 hover:bg-slate-600
                              text-white
                              px-5 py-2.5
                              rounded-lg
                              text-sm font-semibold
                              shadow-sm
                              transition">

                        <i class="fa-solid fa-rotate-left"></i>

                        Reset

                    </a>

                </div>

            </form>

        </div>

    </div>


    {{-- =========================================================
        TABEL DATA KASUS
    ========================================================== --}}
    <div class="bg-white rounded-2xl shadow-sm
                border border-slate-200 overflow-hidden">

        {{-- HEADER TABEL --}}
        <div class="px-6 py-5
                    bg-gradient-to-r from-blue-50 to-indigo-50
                    border-b border-blue-100">

            <div class="flex items-center gap-3">

                <div class="w-10 h-10 rounded-xl
                            bg-blue-100
                            flex items-center justify-center">

                    <i class="fa-solid fa-table
                              text-blue-700"></i>

                </div>

                <div>

                    <h2 class="text-lg font-bold text-slate-800">
                        Daftar Data Kasus
                    </h2>

                    <p class="text-xs text-slate-500 mt-1">
                        Data kasus yang tersimpan dalam sistem.
                    </p>

                </div>

            </div>

        </div>


        {{-- TABEL --}}
        <div class="overflow-x-auto">

            <table class="w-full min-w-[1450px]
                          border-collapse">

                {{-- =================================================
                    HEADER
                ================================================== --}}
                <thead>

                    <tr class="bg-blue-50">

                        <th class="px-4 py-3
                                   border border-blue-200
                                   text-center
                                   text-xs font-bold
                                   text-slate-700
                                   whitespace-nowrap">

                            No

                        </th>


                        <th class="px-4 py-3
                                   border border-blue-200
                                   text-center
                                   text-xs font-bold
                                   text-slate-700
                                   whitespace-nowrap">

                            Tahun

                        </th>


                        <th class="px-4 py-3
                                   border border-blue-200
                                   text-left
                                   text-xs font-bold
                                   text-slate-700
                                   whitespace-nowrap">

                            Kabupaten/Kota

                        </th>


                        <th class="px-4 py-3
                                   border border-blue-200
                                   text-center
                                   text-xs font-bold
                                   text-slate-700
                                   whitespace-nowrap">

                            Usia

                        </th>


                        <th class="px-4 py-3
                                   border border-blue-200
                                   text-left
                                   text-xs font-bold
                                   text-slate-700
                                   whitespace-nowrap">

                            Pekerjaan

                        </th>


                        <th class="px-4 py-3
                                   border border-blue-200
                                   text-left
                                   text-xs font-bold
                                   text-slate-700
                                   whitespace-nowrap">

                            Perkawinan

                        </th>


                        <th class="px-4 py-3
                                   border border-blue-200
                                   text-left
                                   text-xs font-bold
                                   text-slate-700
                                   whitespace-nowrap">

                            Tempat Kejadian

                        </th>


                        <th class="px-4 py-3
                                   border border-blue-200
                                   text-left
                                   text-xs font-bold
                                   text-slate-700
                                   whitespace-nowrap">

                            Bentuk Kekerasan

                        </th>


                        <th class="px-4 py-3
                                   border border-blue-200
                                   text-left
                                   text-xs font-bold
                                   text-slate-700
                                   whitespace-nowrap">

                            Pendidikan

                        </th>


                        <th class="px-4 py-3
                                   border border-blue-200
                                   text-left
                                   text-xs font-bold
                                   text-slate-700
                                   whitespace-nowrap">

                            Jenis Layanan

                        </th>


                        <th class="px-4 py-3
                                   border border-blue-200
                                   text-center
                                   text-xs font-bold
                                   text-slate-700
                                   whitespace-nowrap">

                            Aksi

                        </th>

                    </tr>

                </thead>


                {{-- =================================================
                    BODY
                ================================================== --}}
                <tbody>

                @forelse($kasus as $item)

                    <tr class="bg-white
                               hover:bg-blue-50/60
                               transition">

                        {{-- NO --}}
                        <td class="px-4 py-3
                                   border border-slate-200
                                   text-center
                                   text-sm text-slate-600
                                   whitespace-nowrap">

                            {{ $loop->iteration }}

                        </td>


                        {{-- TAHUN --}}
                        <td class="px-4 py-3
                                   border border-slate-200
                                   text-center
                                   text-sm font-medium
                                   text-slate-700
                                   whitespace-nowrap">

                            {{ $item->tahun ?? '-' }}

                        </td>


                        {{-- KABUPATEN / KOTA --}}
                        <td class="px-4 py-3
                                   border border-slate-200
                                   text-sm text-slate-700
                                   whitespace-nowrap">

                            {{ $item->kabupatenKota->nama_kabupaten ?? '-' }}

                        </td>


                        {{-- USIA --}}
                        <td class="px-4 py-3
                                   border border-slate-200
                                   text-center
                                   text-sm text-slate-700
                                   whitespace-nowrap">

                            {{ $item->usia_korban ?? '-' }}

                        </td>


                        {{-- PEKERJAAN --}}
                        <td class="px-4 py-3
                                   border border-slate-200
                                   text-sm text-slate-700
                                   whitespace-nowrap">

                            {{ $item->statusPekerjaan->nama_pekerjaan ?? '-' }}

                        </td>


                        {{-- PERKAWINAN --}}
                        <td class="px-4 py-3
                                   border border-slate-200
                                   text-sm text-slate-700
                                   whitespace-nowrap">

                            {{ $item->statusPerkawinan->nama_perkawinan ?? '-' }}

                        </td>


                        {{-- TEMPAT --}}
                        <td class="px-4 py-3
                                   border border-slate-200
                                   text-sm text-slate-700
                                   whitespace-nowrap">

                            {{ $item->tempatKejadian->nama_tempat ?? '-' }}

                        </td>


                        {{-- KEKERASAN --}}
                        <td class="px-4 py-3
                                   border border-slate-200
                                   text-sm text-slate-700
                                   whitespace-nowrap">

                            {{ $item->bentukKekerasan->nama_kekerasan ?? '-' }}

                        </td>


                        {{-- PENDIDIKAN --}}
                        <td class="px-4 py-3
                                   border border-slate-200
                                   text-sm text-slate-700
                                   whitespace-nowrap">

                            {{ $item->tingkatPendidikan->nama_pendidikan ?? '-' }}

                        </td>


                        {{-- LAYANAN --}}
                        <td class="px-4 py-3
                                   border border-slate-200
                                   text-sm text-slate-700
                                   whitespace-nowrap">

                            {{ $item->jenisLayanan->nama_layanan ?? '-' }}

                        </td>


                        {{-- AKSI --}}
                        <td class="px-4 py-3
                                   border border-slate-200
                                   text-center">

                            <div class="flex items-center
                                        justify-center gap-2">

                                {{-- EDIT --}}
                                <a href="{{ route('kasus.edit', $item->id) }}"
                                   class="inline-flex items-center gap-1.5
                                          bg-blue-600
                                          hover:bg-blue-700
                                          text-white
                                          px-3 py-1.5
                                          rounded-lg
                                          text-xs font-semibold
                                          transition">

                                    <i class="fa-solid fa-pen-to-square"></i>

                                    Edit

                                </a>


                                {{-- HAPUS --}}
                                <form
                                    action="{{ route('kasus.destroy', $item->id) }}"
                                    method="POST">

                                    @csrf

                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        onclick="return confirm('Yakin ingin menghapus data ini?')"
                                        class="inline-flex items-center gap-1.5
                                               bg-slate-600
                                               hover:bg-slate-700
                                               text-white
                                               px-3 py-1.5
                                               rounded-lg
                                               text-xs font-semibold
                                               transition">

                                        <i class="fa-solid fa-trash"></i>

                                        Hapus

                                    </button>

                                </form>

                            </div>

                        </td>

                    </tr>


                @empty

                    <tr>

                        <td colspan="11"
                            class="px-6 py-12
                                   border border-slate-200
                                   text-center">

                            <div class="flex flex-col
                                        items-center justify-center">

                                <div class="w-14 h-14 rounded-full
                                            bg-blue-50
                                            flex items-center justify-center
                                            mb-3">

                                    <i class="fa-solid fa-database
                                              text-blue-400 text-xl"></i>

                                </div>

                                <p class="text-sm font-semibold
                                          text-slate-600">

                                    Data kasus belum tersedia

                                </p>

                                <p class="text-xs text-slate-400 mt-1">

                                    Silakan tambahkan data kasus terlebih dahulu.

                                </p>

                            </div>

                        </td>

                    </tr>

                @endforelse

                </tbody>

            </table>

        </div>


        {{-- FOOTER TABEL --}}
        @if($kasus->count() > 0)

            <div class="px-5 py-3
                        bg-slate-50
                        border-t border-slate-200">

                <p class="text-xs text-slate-500">

                    Menampilkan
                    <span class="font-semibold text-slate-700">
                        {{ $kasus->count() }}
                    </span>
                    data kasus

                    @if(request('tahun'))

                        untuk tahun
                        <span class="font-semibold text-blue-700">
                            {{ request('tahun') }}
                        </span>

                    @else

                        dari seluruh tahun

                    @endif

                </p>

            </div>

        @endif

    </div>

</div>

@endsection