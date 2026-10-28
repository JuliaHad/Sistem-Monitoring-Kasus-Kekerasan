@extends('layouts.operator')

@section('content')

<div class="bg-white rounded-xl shadow p-6">

    <h1 class="text-2xl font-bold mb-6">
        Tambah Data Kasus
    </h1>

    {{-- DATA LAPORAN MASUK --}}
    @if($laporan)

        <div class="bg-gray-100 p-4 rounded-lg mb-6">

            <h3 class="font-bold text-lg mb-3">
                Data Laporan Masuk
            </h3>

            <table class="table-auto">

                <tr>
                    <td class="pr-4 font-semibold">
                        Nama Pelapor
                    </td>
                    <td>
                        : {{ $laporan->nama_pelapor }}
                    </td>
                </tr>

                <tr>
                    <td class="pr-4 font-semibold">
                        No HP
                    </td>
                    <td>
                        : {{ $laporan->no_hp }}
                    </td>
                </tr>

                <tr>
                    <td class="pr-4 font-semibold">
                        Alamat
                    </td>
                    <td>
                        : {{ $laporan->alamat }}
                    </td>
                </tr>

                <tr>
                    <td class="pr-4 font-semibold">
                        Deskripsi
                    </td>
                    <td>
                        : {{ $laporan->deskripsi }}
                    </td>
                </tr>

            </table>

        </div>

    @endif


    {{-- PESAN ERROR --}}
    @if(session('error'))

        <div class="bg-red-100 text-red-700 p-4 rounded-lg mb-5">
            {{ session('error') }}
        </div>

    @endif


    @if($errors->any())

        <div class="bg-red-100 text-red-700 p-4 rounded-lg mb-5">

            <ul class="list-disc ml-5">

                @foreach($errors->all() as $error)

                    <li>{{ $error }}</li>

                @endforeach

            </ul>

        </div>

    @endif


    <form action="{{ route('operator.kasus.store') }}" method="POST">

        @csrf

        <div class="grid grid-cols-2 gap-4">

            {{-- TAHUN KASUS --}}
            <div>

                <label class="block mb-2 font-semibold">
                    Tahun Kasus Laporan
                </label>

                <select
                    name="tahun"
                    class="w-full border rounded p-2"
                    required>

                    @for($tahun = date('Y'); $tahun >= 2020; $tahun--)

                        <option
                            value="{{ $tahun }}"
                            {{ old('tahun', date('Y')) == $tahun ? 'selected' : '' }}>

                            {{ $tahun }}

                        </option>

                    @endfor

                </select>

            </div>


            {{-- USIA KORBAN --}}
            <div>

                <label class="block mb-2 font-semibold">
                    Usia Korban
                </label>

                <input
                    type="number"
                    name="usia_korban"
                    value="{{ old('usia_korban') }}"
                    min="0"
                    class="w-full border rounded p-2"
                    required>

            </div>


            {{-- KABUPATEN / KOTA --}}
            <div>

                <label class="block mb-2 font-semibold">
                    Kabupaten / Kota
                </label>

                <select
                    name="kabupaten_kota_id"
                    class="w-full border rounded p-2"
                    required>

                    @foreach($kabupatenKotas as $item)

                        <option
                            value="{{ $item->id }}"
                            {{ old('kabupaten_kota_id') == $item->id ? 'selected' : '' }}>

                            {{ $item->nama_kabupaten }}

                        </option>

                    @endforeach

                </select>

            </div>


            {{-- STATUS PEKERJAAN --}}
            <div>

                <label class="block mb-2 font-semibold">
                    Status Pekerjaan
                </label>

                <select
                    name="status_pekerjaan_id"
                    class="w-full border rounded p-2"
                    required>

                    @foreach($statusPekerjaans as $item)

                        <option
                            value="{{ $item->id }}"
                            {{ old('status_pekerjaan_id') == $item->id ? 'selected' : '' }}>

                            {{ $item->nama_status }}

                        </option>

                    @endforeach

                </select>

            </div>


            {{-- STATUS PERKAWINAN --}}
            <div>

                <label class="block mb-2 font-semibold">
                    Status Perkawinan
                </label>

                <select
                    name="status_perkawinan_id"
                    class="w-full border rounded p-2"
                    required>

                    @foreach($statusPerkawinans as $item)

                        <option
                            value="{{ $item->id }}"
                            {{ old('status_perkawinan_id') == $item->id ? 'selected' : '' }}>

                            {{ $item->nama_status }}

                        </option>

                    @endforeach

                </select>

            </div>


            {{-- TEMPAT KEJADIAN --}}
            <div>

                <label class="block mb-2 font-semibold">
                    Tempat Kejadian
                </label>

                <select
                    name="tempat_kejadian_id"
                    class="w-full border rounded p-2"
                    required>

                    @foreach($tempatKejadians as $item)

                        <option
                            value="{{ $item->id }}"
                            {{ old('tempat_kejadian_id') == $item->id ? 'selected' : '' }}>

                            {{ $item->nama_tempat }}

                        </option>

                    @endforeach

                </select>

            </div>


            {{-- BENTUK KEKERASAN --}}
            <div>

                <label class="block mb-2 font-semibold">
                    Bentuk Kekerasan
                </label>

                <select
                    name="bentuk_kekerasan_id"
                    class="w-full border rounded p-2"
                    required>

                    @foreach($bentukKekerasans as $item)

                        <option
                            value="{{ $item->id }}"
                            {{ old('bentuk_kekerasan_id') == $item->id ? 'selected' : '' }}>

                            {{ $item->nama_kekerasan }}

                        </option>

                    @endforeach

                </select>

            </div>


            {{-- TINGKAT PENDIDIKAN --}}
            <div>

                <label class="block mb-2 font-semibold">
                    Tingkat Pendidikan
                </label>

                <select
                    name="tingkat_pendidikan_id"
                    class="w-full border rounded p-2"
                    required>

                    @foreach($tingkatPendidikans as $item)

                        <option
                            value="{{ $item->id }}"
                            {{ old('tingkat_pendidikan_id') == $item->id ? 'selected' : '' }}>

                            {{ $item->nama_pendidikan }}

                        </option>

                    @endforeach

                </select>

            </div>


            {{-- JENIS LAYANAN --}}
            <div>

                <label class="block mb-2 font-semibold">
                    Jenis Layanan
                </label>

                <select
                    name="jenis_layanan_id"
                    class="w-full border rounded p-2"
                    required>

                    @foreach($jenisLayanans as $item)

                        <option
                            value="{{ $item->id }}"
                            {{ old('jenis_layanan_id') == $item->id ? 'selected' : '' }}>

                            {{ $item->nama_layanan }}

                        </option>

                    @endforeach

                </select>

            </div>


            {{-- LAPORAN ID --}}
            @if($laporan)

                <input
                    type="hidden"
                    name="laporan_id"
                    value="{{ $laporan->id }}">

            @endif

        </div>


        {{-- TOMBOL --}}
        <div class="mt-6">

            <button
                type="submit"
                class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg">

                Simpan Data

            </button>

        </div>

    </form>

</div>

@endsection