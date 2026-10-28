@extends('layouts.user')

@section('content')

<div class="min-h-screen bg-slate-100 p-4 md:p-5">

    <div class="w-full">

        {{-- =========================================================
             HEADER
        ========================================================== --}}

        <div class="bg-white
                    rounded-2xl
                    border border-slate-200
                    shadow-sm
                    overflow-hidden
                    mb-6">

            <div class="px-6 py-5
                        bg-gradient-to-r
                        from-blue-50 via-indigo-50 to-white
                        border-b border-blue-100">

                <div class="flex items-center
                            justify-between
                            gap-4">

                    <div class="flex items-center gap-3">

                        <div class="w-11 h-11
                                    rounded-xl
                                    bg-blue-100
                                    flex items-center
                                    justify-center">

                            <i class="fa-solid fa-file-lines
                                      text-blue-600"></i>

                        </div>

                        <div>

                            <h1 class="text-2xl
                                       md:text-3xl
                                       font-bold
                                       text-slate-800">

                                Data Laporan

                            </h1>

                            <p class="text-sm
                                      text-slate-500
                                      mt-1">

                                Daftar laporan kasus yang telah Anda kirim.

                            </p>

                        </div>

                    </div>


                    <a href="{{ route('lapor-kasus.create') }}"
                       class="inline-flex
                              items-center
                              gap-2
                              bg-blue-600
                              hover:bg-blue-700
                              text-white
                              px-4 py-2.5
                              rounded-lg
                              text-sm
                              font-semibold
                              shadow-sm
                              transition
                              whitespace-nowrap">

                        <i class="fa-solid fa-plus text-xs"></i>

                        Lapor Kasus

                    </a>

                </div>

            </div>

        </div>


        {{-- =========================================================
             ALERT SUCCESS
        ========================================================== --}}

        @if(session('success'))

            <div class="mb-6
                        bg-green-50
                        border border-green-200
                        text-green-700
                        px-4 py-3
                        rounded-xl
                        text-sm">

                {{ session('success') }}

            </div>

        @endif


        {{-- =========================================================
             DAFTAR LAPORAN
        ========================================================== --}}

        <div class="bg-white
                    rounded-2xl
                    border border-slate-200
                    shadow-sm
                    overflow-hidden">

            <div class="px-6 py-5
                        bg-gradient-to-r
                        from-blue-50 via-indigo-50 to-white
                        border-b border-blue-100">

                <div class="flex items-center gap-3">

                    <div class="w-10 h-10
                                rounded-xl
                                bg-blue-100
                                flex items-center
                                justify-center">

                        <i class="fa-solid fa-table-list
                                  text-blue-600"></i>

                    </div>

                    <div>

                        <h2 class="text-lg
                                   font-bold
                                   text-slate-800">

                            Daftar Laporan

                        </h2>

                        <p class="text-sm
                                  text-slate-500
                                  mt-1">

                            Informasi laporan yang telah Anda kirim
                            beserta status verifikasinya.

                        </p>

                    </div>

                </div>

            </div>


            <div class="p-4 md:p-5">

                <div class="overflow-x-auto
                            rounded-xl
                            border border-slate-200">

                    <table class="w-full
                                  min-w-[1100px]">

                        <thead class="bg-slate-50">

                            <tr>

                                <th class="px-4 py-3
                                           text-left
                                           text-xs
                                           font-semibold
                                           uppercase
                                           tracking-wide
                                           text-slate-500
                                           border-b
                                           border-slate-200">

                                    Tahun

                                </th>

                                <th class="px-4 py-3
                                           text-left
                                           text-xs
                                           font-semibold
                                           uppercase
                                           tracking-wide
                                           text-slate-500
                                           border-b
                                           border-slate-200">

                                    Tanggal

                                </th>

                                <th class="px-4 py-3
                                           text-left
                                           text-xs
                                           font-semibold
                                           uppercase
                                           tracking-wide
                                           text-slate-500
                                           border-b
                                           border-slate-200">

                                    Nama Pelapor

                                </th>

                                <th class="px-4 py-3
                                           text-left
                                           text-xs
                                           font-semibold
                                           uppercase
                                           tracking-wide
                                           text-slate-500
                                           border-b
                                           border-slate-200">

                                    No HP

                                </th>

                                <th class="px-4 py-3
                                           text-left
                                           text-xs
                                           font-semibold
                                           uppercase
                                           tracking-wide
                                           text-slate-500
                                           border-b
                                           border-slate-200">

                                    Alamat

                                </th>

                                <th class="px-4 py-3
                                           text-left
                                           text-xs
                                           font-semibold
                                           uppercase
                                           tracking-wide
                                           text-slate-500
                                           border-b
                                           border-slate-200">

                                    Deskripsi Kejadian

                                </th>

                                <th class="px-4 py-3
                                           text-left
                                           text-xs
                                           font-semibold
                                           uppercase
                                           tracking-wide
                                           text-slate-500
                                           border-b
                                           border-slate-200">

                                    Status

                                </th>

                            </tr>

                        </thead>


                        <tbody>

                            @forelse($laporans as $laporan)

                                <tr class="border-b
                                           border-slate-200
                                           hover:bg-slate-50
                                           transition">


                                    {{-- TAHUN --}}

                                    <td class="px-4 py-4
                                               text-sm
                                               text-slate-700
                                               align-top">

                                        {{ $laporan->tahun }}

                                    </td>


                                    {{-- TANGGAL --}}

                                    <td class="px-4 py-4
                                               text-sm
                                               text-slate-700
                                               whitespace-nowrap
                                               align-top">

                                        {{ $laporan->created_at->format('d-m-Y') }}

                                    </td>


                                    {{-- NAMA --}}

                                    <td class="px-4 py-4
                                               align-top">

                                        <div class="flex items-center gap-2">

                                            <div class="w-8 h-8
                                                        rounded-lg
                                                        bg-blue-100
                                                        flex items-center
                                                        justify-center
                                                        shrink-0">

                                                <i class="fa-solid fa-user
                                                          text-blue-600
                                                          text-xs"></i>

                                            </div>

                                            <span class="text-sm
                                                         font-medium
                                                         text-slate-700">

                                                {{ $laporan->nama_pelapor }}

                                            </span>

                                        </div>

                                    </td>


                                    {{-- NO HP --}}

                                    <td class="px-4 py-4
                                               text-sm
                                               text-slate-700
                                               whitespace-nowrap
                                               align-top">

                                        {{ $laporan->no_hp }}

                                    </td>


                                    {{-- ALAMAT --}}

                                    <td class="px-4 py-4
                                               text-sm
                                               text-slate-700
                                               align-top">

                                        <div class="max-w-[230px]
                                                    leading-5">

                                            {{ $laporan->alamat }}

                                        </div>

                                    </td>


                                    {{-- DESKRIPSI --}}

                                    <td class="px-4 py-4
                                               text-sm
                                               text-slate-700
                                               align-top">

                                        <div class="max-w-[360px]
                                                    leading-5">

                                            {{ $laporan->deskripsi }}

                                        </div>

                                    </td>


                                    {{-- STATUS --}}

                                    <td class="px-4 py-4
                                               align-top">

                                        @if($laporan->status_verifikasi == 'Menunggu')

                                            <span class="inline-flex
                                                         items-center
                                                         gap-1.5
                                                         bg-yellow-100
                                                         text-yellow-700
                                                         px-3 py-1.5
                                                         rounded-full
                                                         text-xs
                                                         font-semibold
                                                         whitespace-nowrap">

                                                <span class="w-1.5 h-1.5
                                                             rounded-full
                                                             bg-yellow-500">
                                                </span>

                                                Menunggu

                                            </span>

                                        @elseif($laporan->status_verifikasi == 'Diverifikasi')

                                            <span class="inline-flex
                                                         items-center
                                                         gap-1.5
                                                         bg-blue-100
                                                         text-blue-700
                                                         px-3 py-1.5
                                                         rounded-full
                                                         text-xs
                                                         font-semibold
                                                         whitespace-nowrap">

                                                <span class="w-1.5 h-1.5
                                                             rounded-full
                                                             bg-blue-500">
                                                </span>

                                                Diverifikasi

                                            </span>

                                        @elseif($laporan->status_verifikasi == 'Ditolak')

                                            <span class="inline-flex
                                                         items-center
                                                         gap-1.5
                                                         bg-slate-200
                                                         text-slate-700
                                                         px-3 py-1.5
                                                         rounded-full
                                                         text-xs
                                                         font-semibold
                                                         whitespace-nowrap">

                                                <span class="w-1.5 h-1.5
                                                             rounded-full
                                                             bg-slate-500">
                                                </span>

                                                Ditolak

                                            </span>

                                        @else

                                            <span class="inline-flex
                                                         items-center
                                                         gap-1.5
                                                         bg-gray-100
                                                         text-gray-700
                                                         px-3 py-1.5
                                                         rounded-full
                                                         text-xs
                                                         font-semibold
                                                         whitespace-nowrap">

                                                {{ $laporan->status_verifikasi }}

                                            </span>

                                        @endif

                                    </td>

                                </tr>

                            @empty

                                <tr>

                                    <td colspan="7"
                                        class="text-center
                                               px-4 py-10
                                               text-sm
                                               text-slate-500">

                                        Belum ada laporan yang dikirim.

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