@extends('layouts.user')

@section('content')

<div class="bg-white rounded-2xl shadow-lg p-6">

    <h1 class="text-2xl font-bold mb-6">
        Lapor Kasus
    </h1>

    @if ($errors->any())

        <div class="bg-red-100 text-red-700 p-4 rounded mb-4">

            <ul>

                @foreach ($errors->all() as $error)

                    <li>{{ $error }}</li>

                @endforeach

            </ul>

        </div>

    @endif

    <form action="{{ route('lapor-kasus.store') }}" method="POST">

        @csrf

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

            {{-- Nama Pelapor --}}
            <div>

                <label class="block mb-2 font-semibold">
                    Nama Pelapor
                </label>

                <input
                    type="text"
                    name="nama_pelapor"
                    class="w-full border rounded p-2"
                    required>

            </div>

            {{-- No HP --}}
            <div>

                <label class="block mb-2 font-semibold">
                    No HP
                </label>

                <input
                    type="text"
                    name="no_hp"
                    class="w-full border rounded p-2"
                    required>

            </div>

            {{-- Alamat --}}
            <div class="md:col-span-2">

                <label class="block mb-2 font-semibold">
                    Alamat
                </label>

                <textarea
                    name="alamat"
                    rows="2"
                    class="w-full border rounded p-2"
                    required></textarea>

            </div>

            {{-- Usia Korban --}}
            <div>

                <label class="block mb-2 font-semibold">
                    Usia Korban
                </label>

                <input
                    type="number"
                    name="usia_korban"
                    class="w-full border rounded p-2"
                    required>

            </div>

            {{-- Kabupaten --}}
            <div>

                <label class="block mb-2 font-semibold">
                    Kabupaten / Kota
                </label>

<select
    name="kabupaten_kota_id"
    class="w-full border rounded p-2"
    required>

    <option value="">-- Pilih Kabupaten / Kota --</option>

    @foreach($kabupatenKotas as $item)
        <option value="{{ $item->id }}">
            {{ $item->nama_kabupaten }}
        </option>
    @endforeach

</select>

            </div>

            {{-- Status Pekerjaan --}}
            <div>

                <label class="block mb-2 font-semibold">
                    Status Pekerjaan
                </label>

                <select
                    name="status_pekerjaan_id"
                    class="w-full border rounded p-2"
                    required>

                    @foreach($statusPekerjaans as $item)
    <option value="{{ $item->id }}">
        {{ $item->nama_pekerjaan }}
    </option>
@endforeach

                </select>

            </div>

            {{-- Status Perkawinan --}}
            <div>

                <label class="block mb-2 font-semibold">
                    Status Perkawinan
                </label>

                <select
                    name="status_perkawinan_id"
                    class="w-full border rounded p-2"
                    required>

                    @foreach($statusPerkawinans as $item)
    <option value="{{ $item->id }}">
        {{ $item->nama_perkawinan }}
    </option>
@endforeach

                </select>

            </div>

            {{-- Tempat Kejadian --}}
            <div>

                <label class="block mb-2 font-semibold">
                    Tempat Kejadian
                </label>

                <select
                    name="tempat_kejadian_id"
                    class="w-full border rounded p-2"
                    required>

                    @foreach($tempatKejadians as $item)

                        <option value="{{ $item->id }}">
                            {{ $item->nama_tempat }}
                        </option>

                    @endforeach

                </select>

            </div>

            {{-- Bentuk Kekerasan --}}
            <div>

                <label class="block mb-2 font-semibold">
                    Bentuk Kekerasan
                </label>

                <select
                    name="bentuk_kekerasan_id"
                    class="w-full border rounded p-2"
                    required>

                    @foreach($bentukKekerasans as $item)

                        <option value="{{ $item->id }}">
                            {{ $item->nama_kekerasan }}
                        </option>

                    @endforeach

                </select>

            </div>

            {{-- Tingkat Pendidikan --}}
<div>

    <label class="block mb-2 font-semibold">
        Tingkat Pendidikan
    </label>

    <select
        name="tingkat_pendidikan_id"
        class="w-full border rounded p-2"
        required>

        @foreach($tingkatPendidikans as $item)

            <option value="{{ $item->id }}">
                {{ $item->nama_pendidikan }}
            </option>

        @endforeach

    </select>

</div>

<div>

    <label class="block mb-2 font-semibold">
        Jenis Layanan
    </label>

    <select
        name="jenis_layanan_id"
        class="w-full border rounded p-2"
        required>

        <option value="">
            Jenis Layanan
        </option>

        @foreach($jenisLayanans as $item)

            <option value="{{ $item->id }}">
                {{ $item->nama_layanan }}
            </option>

        @endforeach

    </select>

</div>

{{-- Deskripsi --}}
<div class="md:col-span-2">

    <label class="block mb-2 font-semibold">
        Deskripsi Kejadian
    </label>

    <textarea
        name="deskripsi"
        rows="5"
        class="w-full border rounded p-2"
        required></textarea>

</div>

<div class="mt-6">
    <button
        type="submit"
        class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg">
        Kirim Laporan
    </button>
</div>
        </form>

        </div>

        @endsection