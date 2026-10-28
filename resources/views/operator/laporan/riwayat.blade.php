@extends('layouts.operator')

@section('content')

<div class="bg-white rounded-2xl shadow-lg border border-blue-100 p-6">

    <div class="mb-6">

        <h1 class="text-2xl font-bold text-blue-950">
            Riwayat Verifikasi Laporan
        </h1>

        <p class="text-sm text-slate-500 mt-1">
            Daftar laporan yang telah diverifikasi atau ditolak.
        </p>

    </div>

    <div class="overflow-x-auto">

        <table class="w-full border border-blue-100">

            <thead class="bg-blue-50">

                <tr>

                    <th class="border border-blue-100 px-4 py-3 text-left
                               text-sm font-semibold text-blue-950">
                        No
                    </th>

                    <th class="border border-blue-100 px-4 py-3 text-left
                               text-sm font-semibold text-blue-950">
                        Pelapor
                    </th>

                    <th class="border border-blue-100 px-4 py-3 text-left
                               text-sm font-semibold text-blue-950">
                        No HP
                    </th>

                    <th class="border border-blue-100 px-4 py-3 text-left
                               text-sm font-semibold text-blue-950">
                        Alamat
                    </th>

                    <th class="border border-blue-100 px-4 py-3 text-center
                               text-sm font-semibold text-blue-950">
                        Status
                    </th>

                </tr>

            </thead>

            <tbody>

                @forelse($laporans as $laporan)

                    <tr class="hover:bg-blue-50 transition">

                        <td class="border border-blue-100 px-4 py-3 text-sm text-slate-700">
                            {{ $loop->iteration }}
                        </td>

                        <td class="border border-blue-100 px-4 py-3 text-sm text-slate-700">
                            {{ $laporan->nama_pelapor }}
                        </td>

                        <td class="border border-blue-100 px-4 py-3 text-sm text-slate-700">
                            {{ $laporan->no_hp }}
                        </td>

                        <td class="border border-blue-100 px-4 py-3 text-sm text-slate-700">
                            {{ $laporan->alamat }}
                        </td>

                        <td class="border border-blue-100 px-4 py-3 text-center">

                            @if($laporan->status_verifikasi === 'Diverifikasi')

                                <span class="inline-flex items-center
                                             bg-blue-100 text-blue-800
                                             px-3 py-1 rounded-full
                                             text-xs font-semibold">

                                    Diverifikasi

                                </span>

                            @elseif($laporan->status_verifikasi === 'Ditolak')

                                <span class="inline-flex items-center
                                             bg-slate-200 text-slate-700
                                             px-3 py-1 rounded-full
                                             text-xs font-semibold">

                                    Ditolak

                                </span>

                            @else

                                <span class="inline-flex items-center
                                             bg-blue-50 text-blue-700
                                             px-3 py-1 rounded-full
                                             text-xs font-semibold">

                                    {{ $laporan->status_verifikasi }}

                                </span>

                            @endif

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td
                            colspan="5"
                            class="border border-blue-100 px-4 py-6
                                   text-center text-sm text-slate-500"
                        >
                            Belum ada riwayat verifikasi laporan.
                        </td>

                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

@endsection