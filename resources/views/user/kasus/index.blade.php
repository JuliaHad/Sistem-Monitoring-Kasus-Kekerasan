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

            <div class="bg-gradient-to-r
                        from-blue-50 via-indigo-50 to-white
                        border-b border-blue-100
                        px-6 py-5">

                <div class="flex items-center gap-3">

                    <div class="w-11 h-11
                                rounded-xl
                                bg-blue-100
                                flex items-center justify-center
                                flex-shrink-0">

                        <i class="fa-solid fa-folder-open
                                  text-blue-600
                                  text-lg"></i>

                    </div>

                    <div>

                        <h1 class="text-2xl md:text-3xl
                                   font-bold
                                   text-slate-800">

                            Data Kasus

                        </h1>

                        <p class="text-sm
                                  text-slate-500
                                  mt-1">

                            Informasi data kasus kekerasan terhadap
                            perempuan dan anak.

                        </p>

                    </div>

                </div>

            </div>

        </div>


        {{-- =========================================================
             DATA KASUS
        ========================================================== --}}

        <div class="bg-white
                    rounded-2xl
                    border border-slate-200
                    shadow-sm
                    overflow-hidden">


            {{-- =====================================================
                 HEADER SECTION + FILTER
            ====================================================== --}}

            <div class="bg-gradient-to-r
                        from-blue-50 via-indigo-50 to-white
                        border-b border-blue-100
                        px-6 py-5">

                <div class="flex flex-col
                            xl:flex-row
                            xl:items-center
                            xl:justify-between
                            gap-4">


                    {{-- JUDUL SECTION --}}

                    <div class="flex items-center gap-3">

                        <div class="w-10 h-10
                                    rounded-xl
                                    bg-blue-100
                                    flex items-center justify-center
                                    flex-shrink-0">

                            <i class="fa-solid fa-table-list
                                      text-blue-600"></i>

                        </div>

                        <div>

                            <h2 class="text-lg
                                       font-bold
                                       text-slate-800">

                                Daftar Data Kasus

                            </h2>

                            <p class="text-sm
                                      text-slate-500
                                      mt-1">

                                Gunakan filter tahun untuk menampilkan
                                data pada periode tertentu.

                            </p>

                        </div>

                    </div>


                    {{-- =================================================
                         FILTER TAHUN
                    ================================================== --}}

                    <form method="GET">

                        <div class="flex flex-col
                                    sm:flex-row
                                    sm:items-center
                                    gap-2">

                            <div class="relative">

                                <select
                                    name="tahun"
                                    class="w-full sm:w-44
                                           bg-white
                                           border border-slate-300
                                           text-slate-700
                                           text-sm
                                           rounded-lg
                                           px-4 py-2.5
                                           pr-9
                                           focus:outline-none
                                           focus:ring-2
                                           focus:ring-blue-500
                                           focus:border-blue-500">

                                    <option value="">
                                        Semua Tahun
                                    </option>

                                    @foreach($tahunList as $tahun)

                                        <option
                                            value="{{ $tahun }}"
                                            {{ request('tahun') == $tahun ? 'selected' : '' }}>

                                            {{ $tahun }}

                                        </option>

                                    @endforeach

                                </select>

                            </div>


                            {{-- FILTER --}}

                            <button
                                type="submit"
                                class="inline-flex
                                       items-center
                                       justify-center
                                       gap-2
                                       bg-blue-600
                                       hover:bg-blue-700
                                       text-white
                                       px-4 py-2.5
                                       rounded-lg
                                       text-sm
                                       font-semibold
                                       shadow-sm
                                       transition">

                                <i class="fa-solid fa-filter
                                          text-xs"></i>

                                Filter

                            </button>


                            {{-- RESET --}}

                            <a href="{{ route('user.kasus') }}"
                               class="inline-flex
                                      items-center
                                      justify-center
                                      gap-2
                                      bg-slate-600
                                      hover:bg-slate-700
                                      text-white
                                      px-4 py-2.5
                                      rounded-lg
                                      text-sm
                                      font-semibold
                                      shadow-sm
                                      transition">

                                <i class="fa-solid fa-rotate-left
                                          text-xs"></i>

                                Reset

                            </a>

                        </div>

                    </form>

                </div>

            </div>


            {{-- =====================================================
                 TABLE
            ====================================================== --}}

            <div class="p-5">

                <div class="overflow-x-auto
                            rounded-xl
                            border border-slate-300">

                    <table class="w-full
                                  min-w-[1450px]
                                  border-collapse">

                        {{-- =============================================
                             TABLE HEADER
                        ============================================== --}}

                        <thead>

                            <tr class="bg-slate-100">

                                <th class="border-r border-b border-slate-300
                                           px-4 py-4
                                           text-center
                                           text-xs font-bold
                                           uppercase tracking-wide
                                           text-slate-600
                                           w-16">

                                    No

                                </th>

                                <th class="border-r border-b border-slate-300
                                           px-4 py-4
                                           text-center
                                           text-xs font-bold
                                           uppercase tracking-wide
                                           text-slate-600
                                           w-24">

                                    Tahun

                                </th>

                                <th class="border-r border-b border-slate-300
                                           px-4 py-4
                                           text-left
                                           text-xs font-bold
                                           uppercase tracking-wide
                                           text-slate-600
                                           min-w-[200px]">

                                    Kabupaten/Kota

                                </th>

                                <th class="border-r border-b border-slate-300
                                           px-4 py-4
                                           text-center
                                           text-xs font-bold
                                           uppercase tracking-wide
                                           text-slate-600
                                           w-20">

                                    Usia

                                </th>

                                <th class="border-r border-b border-slate-300
                                           px-4 py-4
                                           text-left
                                           text-xs font-bold
                                           uppercase tracking-wide
                                           text-slate-600
                                           min-w-[150px]">

                                    Pekerjaan

                                </th>

                                <th class="border-r border-b border-slate-300
                                           px-4 py-4
                                           text-left
                                           text-xs font-bold
                                           uppercase tracking-wide
                                           text-slate-600
                                           min-w-[150px]">

                                    Perkawinan

                                </th>

                                <th class="border-r border-b border-slate-300
                                           px-4 py-4
                                           text-left
                                           text-xs font-bold
                                           uppercase tracking-wide
                                           text-slate-600
                                           min-w-[160px]">

                                    Tempat Kejadian

                                </th>

                                <th class="border-r border-b border-slate-300
                                           px-4 py-4
                                           text-left
                                           text-xs font-bold
                                           uppercase tracking-wide
                                           text-slate-600
                                           min-w-[160px]">

                                    Bentuk Kekerasan

                                </th>

                                <th class="border-r border-b border-slate-300
                                           px-4 py-4
                                           text-left
                                           text-xs font-bold
                                           uppercase tracking-wide
                                           text-slate-600
                                           min-w-[210px]">

                                    Pendidikan

                                </th>

                                <th class="border-b border-slate-300
                                           px-4 py-4
                                           text-left
                                           text-xs font-bold
                                           uppercase tracking-wide
                                           text-slate-600
                                           min-w-[160px]">

                                    Layanan

                                </th>

                            </tr>

                        </thead>


                        {{-- =============================================
                             TABLE BODY
                        ============================================== --}}

                        <tbody>

                            @foreach($kasus as $item)

                                <tr class="bg-white
                                           hover:bg-blue-50/50
                                           transition">


                                    {{-- NO --}}

                                    <td class="border-r border-b border-slate-200
                                               px-4 py-4
                                               text-center
                                               align-middle">

                                        <span class="inline-flex
                                                     items-center
                                                     justify-center
                                                     w-7 h-7
                                                     rounded-lg
                                                     bg-slate-100
                                                     text-slate-600
                                                     text-xs
                                                     font-semibold">

                                            {{ $loop->iteration }}

                                        </span>

                                    </td>


                                    {{-- TAHUN --}}

                                    <td class="border-r border-b border-slate-200
                                               px-4 py-4
                                               text-center
                                               align-middle
                                               text-sm
                                               font-semibold
                                               text-slate-700">

                                        {{ $item->tahun }}

                                    </td>


                                    {{-- KABUPATEN/KOTA --}}

                                    <td class="border-r border-b border-slate-200
                                               px-4 py-4
                                               align-middle">

                                        <div class="flex items-start gap-2">

                                            <i class="fa-solid fa-location-dot
                                                      text-blue-500
                                                      text-xs
                                                      mt-1"></i>

                                            <span class="text-sm
                                                         leading-5
                                                         text-slate-700">

                                                {{ $item->kabupatenKota->nama_kabupaten ?? '-' }}

                                            </span>

                                        </div>

                                    </td>


                                    {{-- USIA --}}

                                    <td class="border-r border-b border-slate-200
                                               px-4 py-4
                                               text-center
                                               align-middle
                                               text-sm
                                               text-slate-700">

                                        {{ $item->usia_korban }}

                                    </td>


                                    {{-- PEKERJAAN --}}

                                    <td class="border-r border-b border-slate-200
                                               px-4 py-4
                                               align-middle
                                               text-sm
                                               leading-5
                                               text-slate-700">

                                        {{ $item->statusPekerjaan->nama_pekerjaan ?? '-' }}

                                    </td>


                                    {{-- PERKAWINAN --}}

                                    <td class="border-r border-b border-slate-200
                                               px-4 py-4
                                               align-middle
                                               text-sm
                                               leading-5
                                               text-slate-700">

                                        {{ $item->statusPerkawinan->nama_perkawinan ?? '-' }}

                                    </td>


                                    {{-- TEMPAT KEJADIAN --}}

                                    <td class="border-r border-b border-slate-200
                                               px-4 py-4
                                               align-middle
                                               text-sm
                                               leading-5
                                               text-slate-700">

                                        {{ $item->tempatKejadian->nama_tempat ?? '-' }}

                                    </td>


                                    {{-- BENTUK KEKERASAN --}}

                                    <td class="border-r border-b border-slate-200
                                               px-4 py-4
                                               align-middle
                                               text-sm
                                               leading-5
                                               text-slate-700">

                                        {{ $item->bentukKekerasan->nama_kekerasan ?? '-' }}

                                    </td>


                                    {{-- PENDIDIKAN --}}

                                    <td class="border-r border-b border-slate-200
                                               px-4 py-4
                                               align-middle
                                               text-sm
                                               leading-5
                                               text-slate-700">

                                        {{ $item->tingkatPendidikan->nama_pendidikan ?? '-' }}

                                    </td>


                                    {{-- LAYANAN --}}

                                    <td class="border-b border-slate-200
                                               px-4 py-4
                                               align-middle
                                               text-sm
                                               leading-5
                                               text-slate-700">

                                        {{ $item->jenisLayanan->nama_layanan ?? '-' }}

                                    </td>

                                </tr>

                            @endforeach

                        </tbody>

                    </table>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection