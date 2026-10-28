@extends('layouts.app')

@section('content')

<div class="bg-white rounded-xl shadow p-6">

    <h1 class="text-2xl font-bold mb-6">
        Edit Data Kasus
    </h1>

    <form action="{{ route('kasus.update', $kasus->id) }}" method="POST">

        @csrf
        @method('PUT')

        <div class="grid grid-cols-2 gap-4">

            <div>
                <label class="font-semibold">Tahun Laporan</label>

                <select name="laporan_id" class="w-full border rounded p-2">

                    @foreach($laporans as $laporan)
                        <option value="{{ $laporan->id }}"
                            {{ $kasus->laporan_id == $laporan->id ? 'selected' : '' }}>
                            {{ $laporan->tahun }}
                        </option>
                    @endforeach

                </select>
            </div>

            <div>
                <label class="font-semibold">Usia Korban</label>

                <input
                    type="number"
                    name="usia_korban"
                    value="{{ $kasus->usia_korban }}"
                    class="w-full border rounded p-2">
            </div>

            <div>
                <label class="font-semibold">
                    Kabupaten / Kota
                </label>

                <select name="kabupaten_kota_id"
                        class="w-full border rounded p-2">

                    @foreach($kabupatenKotas as $item)
                        <option value="{{ $item->id }}"
                            {{ $kasus->kabupaten_kota_id == $item->id ? 'selected' : '' }}>
                            {{ $item->nama_kabupaten }}
                        </option>
                    @endforeach

                </select>
            </div>

            <div>
                <label class="font-semibold">
                    Status Pekerjaan
                </label>

                <select name="status_pekerjaan_id"
                        class="w-full border rounded p-2">

                    @foreach($statusPekerjaans as $item)
                        <option value="{{ $item->id }}"
                            {{ $kasus->status_pekerjaan_id == $item->id ? 'selected' : '' }}>
                            {{ $item->nama_pekerjaan }}
                        </option>
                    @endforeach

                </select>
            </div>

            <div>
                <label class="font-semibold">
                    Status Perkawinan
                </label>

                <select name="status_perkawinan_id"
                        class="w-full border rounded p-2">

                    @foreach($statusPerkawinans as $item)
                        <option value="{{ $item->id }}"
                            {{ $kasus->status_perkawinan_id == $item->id ? 'selected' : '' }}>
                            {{ $item->nama_perkawinan }}
                        </option>
                    @endforeach

                </select>
            </div>

            <div>
                <label class="font-semibold">
                    Tempat Kejadian
                </label>

                <select name="tempat_kejadian_id"
                        class="w-full border rounded p-2">

                    @foreach($tempatKejadians as $item)
                        <option value="{{ $item->id }}"
                            {{ $kasus->tempat_kejadian_id == $item->id ? 'selected' : '' }}>
                            {{ $item->nama_tempat }}
                        </option>
                    @endforeach

                </select>
            </div>

            <div>
                <label class="font-semibold">
                    Bentuk Kekerasan
                </label>

                <select name="bentuk_kekerasan_id"
                        class="w-full border rounded p-2">

                    @foreach($bentukKekerasans as $item)
                        <option value="{{ $item->id }}"
                            {{ $kasus->bentuk_kekerasan_id == $item->id ? 'selected' : '' }}>
                            {{ $item->nama_kekerasan }}
                        </option>
                    @endforeach

                </select>
            </div>

            <div>
                <label class="font-semibold">
                    Tingkat Pendidikan
                </label>

                <select name="tingkat_pendidikan_id"
                        class="w-full border rounded p-2">

                    @foreach($tingkatPendidikans as $item)
                        <option value="{{ $item->id }}"
                            {{ $kasus->tingkat_pendidikan_id == $item->id ? 'selected' : '' }}>
                            {{ $item->nama_pendidikan }}
                        </option>
                    @endforeach

                </select>
            </div>

            <div>
                <label class="font-semibold">
                    Jenis Layanan
                </label>

                <select name="jenis_layanan_id"
                        class="w-full border rounded p-2">

                    @foreach($jenisLayanans as $item)
                        <option value="{{ $item->id }}"
                            {{ $kasus->jenis_layanan_id == $item->id ? 'selected' : '' }}>
                            {{ $item->nama_layanan }}
                        </option>
                    @endforeach

                </select>
            </div>

        </div>

        <div class="mt-6">

            <button type="submit"
                class="bg-yellow-500 text-white px-6 py-2 rounded-lg">

                Update Data

            </button>

        </div>

    </form>

</div>

@endsection