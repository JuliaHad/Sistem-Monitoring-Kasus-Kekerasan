@extends('layouts.app')

@section('content')

<div class="container mx-auto p-6">

    <div class="bg-white rounded-xl shadow-lg p-6">

        {{-- Header --}}
        <div class="flex justify-between items-center mb-6">

            <h1 class="text-3xl font-bold text-gray-800">
                Kelola Data Laporan
            </h1>

            <a href="{{ route('laporan.create') }}"
               class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded-lg shadow">
                + Tambah Data
            </a>

        </div>

        {{-- Alert --}}
        @if(session('success'))
            <div class="bg-green-100 border border-green-300 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        {{-- Table --}}
        <div class="overflow-x-auto">

            <table class="w-full border border-gray-200">

                <thead class="bg-gray-100">

                    <tr>
                        <th class="border p-3">No</th>
                        <th class="border p-3">Tahun</th>
                        <th class="border p-3">User</th>
                        <th class="border p-3 text-center">Aksi</th>
                    </tr>

                </thead>

                <tbody>

                @forelse($laporans as $item)

                    <tr class="hover:bg-gray-50">

                        <td class="border p-3 text-center">
                            {{ $loop->iteration }}
                        </td>

                        <td class="border p-3 text-center">
                            {{ $item->tahun }}
                        </td>

                        <td class="border p-3">
                            {{ $item->user->name ?? '-' }}
                        </td>

                        <td class="border p-3">

                            <div class="flex justify-center gap-2">

                                <a href="{{ route('laporan.edit', $item->id) }}"
                                   class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded">
                                    Edit
                                </a>

                                <form action="{{ route('laporan.destroy', $item->id) }}"
                                      method="POST">

                                    @csrf
                                    @method('DELETE')

                                    <button
                                        onclick="return confirm('Yakin hapus data?')"
                                        class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded">

                                        Hapus

                                    </button>

                                </form>

                            </div>

                        </td>

                    </tr>

                @empty

                    <tr>
                        <td colspan="4"
                            class="text-center p-6 text-gray-500">

                            Data laporan belum tersedia

                        </td>
                    </tr>

                @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection