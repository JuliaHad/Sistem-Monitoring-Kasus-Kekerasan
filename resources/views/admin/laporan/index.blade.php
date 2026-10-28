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

                <div class="flex flex-col sm:flex-row
                            sm:items-center sm:justify-between gap-4">

                    {{-- JUDUL --}}

                    <div class="flex items-center gap-3">

                        <div class="w-11 h-11 rounded-xl bg-blue-100
                                    flex items-center justify-center">

                            <i class="fa-solid fa-file-circle-check
                                      text-blue-600 text-lg"></i>

                        </div>

                        <div>

                            <h1 class="text-xl md:text-2xl font-bold text-slate-800">
                                Kelola Laporan
                            </h1>

                            <p class="text-sm text-slate-500 mt-1">
                                Kelola dan verifikasi laporan kasus yang masuk.
                            </p>

                        </div>

                    </div>


                    {{-- JUMLAH LAPORAN MENUNGGU --}}

                    <div class="inline-flex items-center gap-2
                                bg-yellow-50
                                border border-yellow-200
                                text-yellow-700
                                px-4 py-2.5
                                rounded-xl
                                text-sm font-semibold">

                        <i class="fa-solid fa-clock"></i>

                        <span>
                            {{ $laporans->count() }} Laporan Menunggu
                        </span>

                    </div>

                </div>

            </div>

        </div>


        {{-- =========================================================
             PESAN SUKSES
        ========================================================== --}}

        @if(session('success'))

            <div class="bg-emerald-50
                        border border-emerald-200
                        rounded-xl
                        p-4 mb-6
                        flex items-start gap-3">

                <div class="w-9 h-9 rounded-lg
                            bg-emerald-100
                            flex items-center justify-center
                            shrink-0">

                    <i class="fa-solid fa-circle-check
                              text-emerald-600"></i>

                </div>

                <div>

                    <p class="text-sm font-semibold text-emerald-800">
                        Berhasil
                    </p>

                    <p class="text-sm text-emerald-700 mt-0.5">
                        {{ session('success') }}
                    </p>

                </div>

            </div>

        @endif


        {{-- =========================================================
             TABEL LAPORAN
        ========================================================== --}}

        <div class="bg-white rounded-2xl
                    border border-slate-200
                    shadow-sm overflow-hidden">


            {{-- SECTION HEADER --}}

            <div class="bg-gradient-to-r from-blue-50 via-indigo-50 to-white
                        border-b border-blue-100
                        px-6 py-4">

                <div class="flex items-center gap-3">

                    <div class="w-10 h-10 rounded-xl
                                bg-blue-100
                                flex items-center justify-center">

                        <i class="fa-solid fa-table-list
                                  text-blue-600"></i>

                    </div>

                    <div>

                        <h2 class="font-bold text-slate-800">
                            Daftar Laporan Menunggu Verifikasi
                        </h2>

                        <p class="text-xs text-slate-500 mt-0.5">
                            Periksa laporan sebelum menentukan status verifikasi.
                        </p>

                    </div>

                </div>

            </div>


            {{-- TABLE --}}

            <div class="p-5">

                <div class="overflow-x-auto
                            border border-slate-200
                            rounded-xl">

                    <table class="w-full min-w-[900px]">

                        <thead class="bg-slate-50">

                            <tr>

                                <th class="border-b border-slate-200
                                           px-4 py-3
                                           text-left
                                           text-xs font-bold
                                           uppercase tracking-wide
                                           text-slate-600
                                           w-16">

                                    No

                                </th>

                                <th class="border-b border-slate-200
                                           px-4 py-3
                                           text-left
                                           text-xs font-bold
                                           uppercase tracking-wide
                                           text-slate-600">

                                    Nama Pelapor

                                </th>

                                <th class="border-b border-slate-200
                                           px-4 py-3
                                           text-left
                                           text-xs font-bold
                                           uppercase tracking-wide
                                           text-slate-600">

                                    No HP

                                </th>

                                <th class="border-b border-slate-200
                                           px-4 py-3
                                           text-left
                                           text-xs font-bold
                                           uppercase tracking-wide
                                           text-slate-600">

                                    Alamat

                                </th>

                                <th class="border-b border-slate-200
                                           px-4 py-3
                                           text-left
                                           text-xs font-bold
                                           uppercase tracking-wide
                                           text-slate-600
                                           w-36">

                                    Status

                                </th>

                                <th class="border-b border-slate-200
                                           px-4 py-3
                                           text-center
                                           text-xs font-bold
                                           uppercase tracking-wide
                                           text-slate-600
                                           w-64">

                                    Aksi

                                </th>

                            </tr>

                        </thead>


                        <tbody class="divide-y divide-slate-100">

                            @forelse($laporans as $laporan)

                            <tr class="hover:bg-blue-50/40 transition">


                                {{-- NOMOR --}}

                                <td class="px-4 py-4
                                           text-sm text-slate-500">

                                    {{ $loop->iteration }}

                                </td>


                                {{-- NAMA PELAPOR --}}

                                <td class="px-4 py-4">

                                    <div class="flex items-center gap-3">

                                        <div class="w-9 h-9 rounded-lg
                                                    bg-blue-100
                                                    flex items-center justify-center
                                                    shrink-0">

                                            <i class="fa-solid fa-user
                                                      text-blue-600 text-sm"></i>

                                        </div>

                                        <span class="text-sm font-semibold
                                                     text-slate-700">

                                            {{ $laporan->nama_pelapor }}

                                        </span>

                                    </div>

                                </td>


                                {{-- NO HP --}}

                                <td class="px-4 py-4">

                                    <div class="flex items-center gap-2
                                                text-sm text-slate-600">

                                        <i class="fa-solid fa-phone
                                                  text-slate-400 text-xs"></i>

                                        {{ $laporan->no_hp }}

                                    </div>

                                </td>


                                {{-- ALAMAT --}}

                                <td class="px-4 py-4">

                                    <div class="flex items-start gap-2
                                                text-sm text-slate-600
                                                max-w-xs">

                                        <i class="fa-solid fa-location-dot
                                                  text-slate-400 text-xs mt-1"></i>

                                        <span>
                                            {{ $laporan->alamat }}
                                        </span>

                                    </div>

                                </td>


                                {{-- STATUS --}}

                                <td class="px-4 py-4">

                                    @if($laporan->status_verifikasi == 'Menunggu')

                                        <span class="inline-flex items-center
                                                     gap-2
                                                     bg-yellow-50
                                                     border border-yellow-200
                                                     text-yellow-700
                                                     px-3 py-1.5
                                                     rounded-full
                                                     text-xs font-semibold">

                                            <span class="w-1.5 h-1.5
                                                         rounded-full
                                                         bg-yellow-500"></span>

                                            Menunggu

                                        </span>

                                    @elseif($laporan->status_verifikasi == 'Diverifikasi')

                                        <span class="inline-flex items-center
                                                     gap-2
                                                     bg-emerald-50
                                                     border border-emerald-200
                                                     text-emerald-700
                                                     px-3 py-1.5
                                                     rounded-full
                                                     text-xs font-semibold">

                                            <span class="w-1.5 h-1.5
                                                         rounded-full
                                                         bg-emerald-500"></span>

                                            Diverifikasi

                                        </span>

                                    @else

                                        <span class="inline-flex items-center
                                                     gap-2
                                                     bg-red-50
                                                     border border-red-200
                                                     text-red-700
                                                     px-3 py-1.5
                                                     rounded-full
                                                     text-xs font-semibold">

                                            <span class="w-1.5 h-1.5
                                                         rounded-full
                                                         bg-red-500"></span>

                                            Ditolak

                                        </span>

                                    @endif

                                </td>


                                {{-- AKSI --}}

                                <td class="px-4 py-4">

                                    <div class="flex justify-center
                                                items-center gap-2">


                                        {{-- DETAIL --}}

                                        <button
                                            onclick="showDetail('{{ $laporan->nama_pelapor }}',
                                                                '{{ $laporan->no_hp }}',
                                                                '{{ $laporan->alamat }}',
                                                                '{{ $laporan->deskripsi }}')"
                                            class="inline-flex items-center
                                                   gap-2
                                                   bg-blue-50
                                                   hover:bg-blue-100
                                                   text-blue-700
                                                   border border-blue-200
                                                   px-3 py-2
                                                   rounded-lg
                                                   text-xs font-semibold
                                                   transition">

                                            <i class="fa-solid fa-eye"></i>

                                            Detail

                                        </button>


                                        @if($laporan->status_verifikasi == 'Menunggu')


                                            {{-- FORM --}}
                                            <form
                                                action="{{ route('laporan.verifikasi',$laporan->id) }}"
                                                method="POST"
                                                class="flex items-center gap-2">

                                                @csrf


                                                {{-- VERIFIKASI --}}

                                                <a
                                                    href="{{ route('laporan.verifikasi',$laporan->id) }}"
                                                    class="inline-flex items-center
                                                           gap-2
                                                           bg-emerald-600
                                                           hover:bg-emerald-700
                                                           text-white
                                                           px-3 py-2
                                                           rounded-lg
                                                           text-xs font-semibold
                                                           transition
                                                           shadow-sm">

                                                    <i class="fa-solid fa-check"></i>

                                                    Verifikasi

                                                </a>


                                                {{-- TOLAK --}}

                                                <a
                                                    href="{{ route('laporan.tolak',$laporan->id) }}"
                                                    onclick="return confirm('Yakin ingin menolak laporan ini?')"
                                                    class="inline-flex items-center
                                                           gap-2
                                                           bg-red-600
                                                           hover:bg-red-700
                                                           text-white
                                                           px-3 py-2
                                                           rounded-lg
                                                           text-xs font-semibold
                                                           transition
                                                           shadow-sm">

                                                    <i class="fa-solid fa-xmark"></i>

                                                    Tolak

                                                </a>

                                            </form>

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

                                            <i class="fa-solid fa-inbox
                                                      text-blue-500 text-2xl"></i>

                                        </div>

                                        <h3 class="text-sm font-semibold
                                                   text-slate-700">

                                            Tidak Ada Laporan Menunggu

                                        </h3>

                                        <p class="text-xs text-slate-400
                                                  mt-1">

                                            Tidak ada laporan yang menunggu verifikasi
                                            saat ini.

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


{{-- =============================================================
     MODAL DETAIL
============================================================== --}}

<div id="detailModal"
     class="hidden fixed inset-0
            bg-slate-900/60 backdrop-blur-sm
            flex items-center justify-center
            z-50 p-4">


    <div class="bg-white rounded-2xl
                shadow-2xl
                w-full max-w-xl
                overflow-hidden">


        {{-- MODAL HEADER --}}

        <div class="bg-gradient-to-r
                    from-blue-50 via-indigo-50 to-white
                    border-b border-blue-100
                    px-6 py-5">

            <div class="flex items-center justify-between">

                <div class="flex items-center gap-3">

                    <div class="w-10 h-10 rounded-xl
                                bg-blue-100
                                flex items-center justify-center">

                        <i class="fa-solid fa-file-lines
                                  text-blue-600"></i>

                    </div>

                    <div>

                        <h2 class="text-lg font-bold text-slate-800">
                            Detail Laporan
                        </h2>

                        <p class="text-xs text-slate-500 mt-0.5">
                            Informasi laporan yang dipilih
                        </p>

                    </div>

                </div>


                <button
                    onclick="closeDetail()"
                    class="w-9 h-9 rounded-lg
                           bg-slate-100
                           hover:bg-slate-200
                           text-slate-500
                           hover:text-slate-700
                           flex items-center justify-center
                           transition">

                    <i class="fa-solid fa-xmark"></i>

                </button>

            </div>

        </div>


        {{-- MODAL CONTENT --}}

        <div class="p-6">

            <div class="space-y-4">


                {{-- NAMA --}}

                <div class="bg-slate-50
                            border border-slate-200
                            rounded-xl p-4">

                    <p class="text-xs font-semibold
                              uppercase tracking-wide
                              text-slate-400 mb-1">

                        Nama Pelapor

                    </p>

                    <p id="dNama"
                       class="text-sm font-semibold
                              text-slate-700">

                    </p>

                </div>


                {{-- NO HP --}}

                <div class="bg-slate-50
                            border border-slate-200
                            rounded-xl p-4">

                    <p class="text-xs font-semibold
                              uppercase tracking-wide
                              text-slate-400 mb-1">

                        No HP

                    </p>

                    <p id="dHp"
                       class="text-sm font-semibold
                              text-slate-700">

                    </p>

                </div>


                {{-- ALAMAT --}}

                <div class="bg-slate-50
                            border border-slate-200
                            rounded-xl p-4">

                    <p class="text-xs font-semibold
                              uppercase tracking-wide
                              text-slate-400 mb-1">

                        Alamat

                    </p>

                    <p id="dAlamat"
                       class="text-sm text-slate-700">

                    </p>

                </div>


                {{-- DESKRIPSI --}}

                <div class="bg-slate-50
                            border border-slate-200
                            rounded-xl p-4">

                    <p class="text-xs font-semibold
                              uppercase tracking-wide
                              text-slate-400 mb-1">

                        Deskripsi

                    </p>

                    <p id="dDeskripsi"
                       class="text-sm text-slate-700
                              leading-relaxed">

                    </p>

                </div>


            </div>


            {{-- MODAL FOOTER --}}

            <div class="mt-6 flex justify-end">

                <button
                    onclick="closeDetail()"
                    class="inline-flex items-center gap-2
                           bg-slate-700
                           hover:bg-slate-800
                           text-white
                           px-5 py-2.5
                           rounded-lg
                           text-sm font-semibold
                           transition">

                    <i class="fa-solid fa-xmark"></i>

                    Tutup

                </button>

            </div>

        </div>

    </div>

</div>


{{-- =============================================================
     JAVASCRIPT
============================================================== --}}

<script>

function showDetail(nama,hp,alamat,deskripsi)
{
    document.getElementById('dNama').innerText = nama;
    document.getElementById('dHp').innerText = hp;
    document.getElementById('dAlamat').innerText = alamat;
    document.getElementById('dDeskripsi').innerText = deskripsi;

    document.getElementById('detailModal')
            .classList.remove('hidden');
}

function closeDetail()
{
    document.getElementById('detailModal')
            .classList.add('hidden');
}

</script>

@endsection