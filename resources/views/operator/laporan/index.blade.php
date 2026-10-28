@extends('layouts.operator')

@section('content')

<div class="bg-white rounded-2xl shadow-lg p-6">

    {{-- HEADER --}}
    <div class="flex justify-between items-center mb-6">

        <div>
            <h1 class="text-2xl font-bold text-slate-800">
                Kelola Laporan
            </h1>

            <p class="text-sm text-slate-500 mt-1">
                Kelola dan verifikasi laporan kasus yang masuk.
            </p>
        </div>

        <span class="bg-yellow-100 text-yellow-700 px-4 py-2 rounded-lg text-sm font-semibold">
            {{ $laporans->where('status_verifikasi', 'Menunggu')->count() }}
            Laporan Menunggu
        </span>

    </div>


    {{-- PESAN SUKSES --}}
    @if(session('success'))

        <div class="bg-green-100 border border-green-200 text-green-700 p-4 rounded-lg mb-5">
            {{ session('success') }}
        </div>

    @endif


    {{-- PESAN ERROR --}}
    @if(session('error'))

        <div class="bg-red-100 border border-red-200 text-red-700 p-4 rounded-lg mb-5">
            {{ session('error') }}
        </div>

    @endif


    {{-- TABEL LAPORAN --}}
    <div class="overflow-x-auto">

        <table class="w-full border border-gray-200">

            <thead class="bg-slate-100">

                <tr>

                    <th class="border px-4 py-3 text-left">
                        No
                    </th>

                    <th class="border px-4 py-3 text-left">
                        Nama Pelapor
                    </th>

                    <th class="border px-4 py-3 text-left">
                        No HP
                    </th>

                    <th class="border px-4 py-3 text-left">
                        Alamat
                    </th>

                    <th class="border px-4 py-3 text-left">
                        Status
                    </th>

                    <th class="border px-4 py-3 text-center">
                        Aksi
                    </th>

                </tr>

            </thead>


            <tbody>

                @forelse($laporans as $laporan)

                    <tr class="hover:bg-slate-50">

                        {{-- NOMOR --}}
                        <td class="border px-4 py-3">
                            {{ $loop->iteration }}
                        </td>


                        {{-- NAMA --}}
                        <td class="border px-4 py-3">
                            {{ $laporan->nama_pelapor }}
                        </td>


                        {{-- NO HP --}}
                        <td class="border px-4 py-3">
                            {{ $laporan->no_hp }}
                        </td>


                        {{-- ALAMAT --}}
                        <td class="border px-4 py-3">
                            {{ $laporan->alamat }}
                        </td>


                        {{-- STATUS --}}
                        <td class="border px-4 py-3">

                            @if($laporan->status_verifikasi === 'Menunggu')

                                <span class="inline-block bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full text-sm font-medium">
                                    Menunggu
                                </span>

                            @elseif($laporan->status_verifikasi === 'Diverifikasi')

                                <span class="inline-block bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm font-medium">
                                    Diverifikasi
                                </span>

                            @else

                                <span class="inline-block bg-red-100 text-red-700 px-3 py-1 rounded-full text-sm font-medium">
                                    Ditolak
                                </span>

                            @endif

                        </td>


                        {{-- AKSI --}}
                        <td class="border px-4 py-3">

                            <div class="flex justify-center items-center gap-2">

                                {{-- DETAIL --}}
                                <button
                                    type="button"
                                    onclick="showDetail(
                                        @js($laporan->nama_pelapor),
                                        @js($laporan->no_hp),
                                        @js($laporan->alamat),
                                        @js($laporan->deskripsi)
                                    )"
                                    class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-2 rounded text-sm">

                                    Detail

                                </button>


                                {{-- VERIFIKASI & TOLAK --}}
                                @if($laporan->status_verifikasi === 'Menunggu')

                                    {{-- VERIFIKASI --}}
                                    <form
                                        action="{{ route('operator.laporan.verifikasi', $laporan->id) }}"
                                        method="POST"
                                        class="inline"
                                    >

                                        @csrf

                                        <button
                                            type="submit"
                                            onclick="return confirm('Yakin ingin memverifikasi laporan ini?')"
                                            class="bg-green-600 hover:bg-green-700 text-white px-3 py-2 rounded text-sm"
                                        >

                                            Verifikasi

                                        </button>

                                    </form>


                                    {{-- TOLAK --}}
                                    <a
                                        href="{{ route('operator.laporan.tolak', $laporan->id) }}"
                                        onclick="return confirm('Yakin ingin menolak laporan ini?')"
                                        class="bg-red-600 hover:bg-red-700 text-white px-3 py-2 rounded text-sm"
                                    >

                                        Tolak

                                    </a>

                                @endif

                            </div>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td
                            colspan="6"
                            class="text-center py-8 text-gray-500"
                        >

                            Tidak ada laporan yang tersedia.

                        </td>

                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>


{{-- ===================================================== --}}
{{-- MODAL DETAIL LAPORAN --}}
{{-- ===================================================== --}}

<div
    id="detailModal"
    class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 px-4"
>

    <div class="bg-white rounded-xl shadow-xl p-6 w-full max-w-xl">

        {{-- HEADER MODAL --}}
        <div class="flex justify-between items-center mb-5">

            <h2 class="text-xl font-bold text-slate-800">
                Detail Laporan
            </h2>

            <button
                type="button"
                onclick="closeDetail()"
                class="text-gray-500 hover:text-red-500 text-2xl"
            >
                &times;
            </button>

        </div>


        {{-- DETAIL --}}
        <div class="space-y-4">

            <div>
                <p class="text-sm text-gray-500">
                    Nama Pelapor
                </p>

                <p
                    id="dNama"
                    class="font-semibold text-slate-800"
                ></p>
            </div>


            <div>
                <p class="text-sm text-gray-500">
                    No HP
                </p>

                <p
                    id="dHp"
                    class="font-semibold text-slate-800"
                ></p>
            </div>


            <div>
                <p class="text-sm text-gray-500">
                    Alamat
                </p>

                <p
                    id="dAlamat"
                    class="font-semibold text-slate-800"
                ></p>
            </div>


            <div>
                <p class="text-sm text-gray-500">
                    Deskripsi
                </p>

                <p
                    id="dDeskripsi"
                    class="text-slate-700 whitespace-pre-line"
                ></p>
            </div>

        </div>


        {{-- TUTUP --}}
        <div class="mt-6 text-right">

            <button
                type="button"
                onclick="closeDetail()"
                class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded"
            >

                Tutup

            </button>

        </div>

    </div>

</div>


{{-- ===================================================== --}}
{{-- JAVASCRIPT MODAL --}}
{{-- ===================================================== --}}

<script>

function showDetail(nama, hp, alamat, deskripsi)
{
    document.getElementById('dNama').textContent = nama ?? '-';

    document.getElementById('dHp').textContent = hp ?? '-';

    document.getElementById('dAlamat').textContent = alamat ?? '-';

    document.getElementById('dDeskripsi').textContent = deskripsi ?? '-';

    document
        .getElementById('detailModal')
        .classList.remove('hidden');
}


function closeDetail()
{
    document
        .getElementById('detailModal')
        .classList.add('hidden');
}


/*
|--------------------------------------------------------------------------
| Tutup modal ketika klik area luar modal
|--------------------------------------------------------------------------
*/

document
    .getElementById('detailModal')
    .addEventListener('click', function(event)
    {
        if (event.target === this)
        {
            closeDetail();
        }
    });

</script>

@endsection