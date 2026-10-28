@extends('layouts.operator')

@section('content')

<div class="bg-white rounded-2xl shadow-lg p-6">

    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-2xl font-bold text-slate-800">
                Edit Data Kasus
            </h1>

            <p class="text-sm text-slate-500 mt-1">
                Perbarui data kasus kekerasan pada sistem monitoring P3AKB.
            </p>
        </div>

        <a href="{{ route('operator.kasus.index') }}"
           class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-lg">
            Kembali
        </a>
    </div>

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

    <form action="{{ route('operator.kasus.update', $kasus->id) }}"
          method="POST">

        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

            {{-- TAHUN --}}
            <div>
                <label class="block font-semibold mb-2">
                    Tahun Kasus Laporan
                </label>

                <select name="tahun"
                        class="w-full border border-gray-300 rounded-lg px-3 py-2"
                        required>

                    @for($tahun = date('Y'); $tahun >= 2020; $tahun--)

                        <option value="{{ $tahun }}"
                            {{ old('tahun', $kasus->tahun) == $tahun ? 'selected' : '' }}>
                            {{ $tahun }}
                        </option>

                    @endfor

                </select>
            </div>


            {{-- USIA --}}
            <div>
                <label class="block font-semibold mb-2">
                    Usia Korban
                </label>

                <input type="number"
                       name="usia_korban"
                       value="{{ old('usia_korban', $kasus->usia_korban) }}"
                       min="0"
                       class="w-full border border-gray-300 rounded-lg px-3 py-2"
                       required>
            </div>


            {{-- KABUPATEN / KOTA --}}
            <div>
                <label class="block font-semibold mb-2">
                    Kabupaten / Kota
                </label>

                <select name="kabupaten_kota_id"
                        class="w-full border border-gray-300 rounded-lg px-3 py-2"
                        required>

                    <option value="">
                        -- Pilih Kabupaten / Kota --
                    </option>

                    @foreach($kabupatenKotas as $item)

                        <option value="{{ $item->id }}"
                            {{ old('kabupaten_kota_id', $kasus->kabupaten_kota_id) == $item->id ? 'selected' : '' }}>

                            {{ $item->nama_kabupaten }}

                        </option>

                    @endforeach

                </select>
            </div>


            {{-- STATUS PEKERJAAN --}}
            <div>
                <label class="block font-semibold mb-2">
                    Status Pekerjaan
                </label>

                <select name="status_pekerjaan_id"
                        class="w-full border border-gray-300 rounded-lg px-3 py-2"
                        required>

                    <option value="">
                        -- Pilih Status Pekerjaan --
                    </option>

                    @foreach($statusPekerjaans as $item)

                        <option value="{{ $item->id }}"
                            {{ old('status_pekerjaan_id', $kasus->status_pekerjaan_id) == $item->id ? 'selected' : '' }}>

                            {{ $item->nama_pekerjaan }}

                        </option>

                    @endforeach

                </select>
            </div>


            {{-- STATUS PERKAWINAN --}}
            <div>
                <label class="block font-semibold mb-2">
                    Status Perkawinan
                </label>

                <select name="status_perkawinan_id"
                        class="w-full border border-gray-300 rounded-lg px-3 py-2"
                        required>

                    <option value="">
                        -- Pilih Status Perkawinan --
                    </option>

                    @foreach($statusPerkawinans as $item)

                        <option value="{{ $item->id }}"
                            {{ old('status_perkawinan_id', $kasus->status_perkawinan_id) == $item->id ? 'selected' : '' }}>

                            {{ $item->nama_perkawinan }}

                        </option>

                    @endforeach

                </select>
            </div>


            {{-- TEMPAT KEJADIAN --}}
            <div>
                <label class="block font-semibold mb-2">
                    Tempat Kejadian
                </label>

                <select name="tempat_kejadian_id"
                        class="w-full border border-gray-300 rounded-lg px-3 py-2"
                        required>

                    <option value="">
                        -- Pilih Tempat Kejadian --
                    </option>

                    @foreach($tempatKejadians as $item)

                        <option value="{{ $item->id }}"
                            {{ old('tempat_kejadian_id', $kasus->tempat_kejadian_id) == $item->id ? 'selected' : '' }}>

                            {{ $item->nama_tempat }}

                        </option>

                    @endforeach

                </select>
            </div>


            {{-- BENTUK KEKERASAN --}}
            <div>
                <label class="block font-semibold mb-2">
                    Bentuk Kekerasan
                </label>

                <select name="bentuk_kekerasan_id"
                        class="w-full border border-gray-300 rounded-lg px-3 py-2"
                        required>

                    <option value="">
                        -- Pilih Bentuk Kekerasan --
                    </option>

                    @foreach($bentukKekerasans as $item)

                        <option value="{{ $item->id }}"
                            {{ old('bentuk_kekerasan_id', $kasus->bentuk_kekerasan_id) == $item->id ? 'selected' : '' }}>

                            {{ $item->nama_kekerasan }}

                        </option>

                    @endforeach

                </select>
            </div>


            {{-- TINGKAT PENDIDIKAN --}}
            <div>
                <label class="block font-semibold mb-2">
                    Tingkat Pendidikan
                </label>

                <select name="tingkat_pendidikan_id"
                        class="w-full border border-gray-300 rounded-lg px-3 py-2"
                        required>

                    <option value="">
                        -- Pilih Tingkat Pendidikan --
                    </option>

                    @foreach($tingkatPendidikans as $item)

                        <option value="{{ $item->id }}"
                            {{ old('tingkat_pendidikan_id', $kasus->tingkat_pendidikan_id) == $item->id ? 'selected' : '' }}>

                            {{ $item->nama_pendidikan }}

                        </option>

                    @endforeach

                </select>
            </div>


            {{-- JENIS LAYANAN --}}
            <div>
                <label class="block font-semibold mb-2">
                    Jenis Layanan
                </label>

                <select name="jenis_layanan_id"
                        class="w-full border border-gray-300 rounded-lg px-3 py-2"
                        required>

                    <option value="">
                        -- Pilih Jenis Layanan --
                    </option>

                    @foreach($jenisLayanans as $item)

                        <option value="{{ $item->id }}"
                            {{ old('jenis_layanan_id', $kasus->jenis_layanan_id) == $item->id ? 'selected' : '' }}>

                            {{ $item->nama_layanan }}

                        </option>

                    @endforeach

                </select>
            </div>

        </div>


        {{-- BUTTON --}}
        <div class="mt-6">

            <button type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg">
                Simpan Perubahan
            </button>

            <a href="{{ route('operator.kasus.index') }}"
               class="ml-2 bg-gray-500 hover:bg-gray-600 text-white px-6 py-2 rounded-lg inline-block">
                Batal
            </a>

        </div>

    </form>

</div>

@endsection