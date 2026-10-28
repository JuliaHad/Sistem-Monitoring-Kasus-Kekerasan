<x-app-layout>
    <div class="min-h-screen bg-gradient-to-br from-yellow-100 via-green-200 to-emerald-700 p-6">

        <!-- CONTAINER -->
        <div class="bg-white/90 backdrop-blur rounded-2xl shadow-2xl p-6">

            <!-- HEADER -->
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-2xl font-bold text-gray-800">
                    Data Laporan
                </h1>

                <a href="{{ route('laporan.create') }}"
                   class="bg-gradient-to-r from-yellow-300 via-green-400 to-emerald-700 text-white px-4 py-2 rounded-lg shadow">
                    + Tambah Data
                </a>
            </div>

            <!-- TABLE -->
            <div class="overflow-x-auto">
                <table class="w-full text-sm text-left text-gray-700">

                    <thead class="bg-green-100 text-gray-700">
                        <tr>
                            <th class="px-4 py-3">No</th>
                            <th class="px-4 py-3">Nama Kasus</th>
                            <th class="px-4 py-3">Lokasi</th>
                            <th class="px-4 py-3">Tanggal</th>
                            <th class="px-4 py-3">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($laporans as $laporan)
                        <tr class="border-b">
                            <td class="px-4 py-2">{{ $loop->iteration }}</td>
                            <td class="px-4 py-2">{{ $laporan->nama_kasus }}</td>
                            <td class="px-4 py-2">{{ $laporan->lokasi }}</td>
                            <td class="px-4 py-2">{{ $laporan->tanggal }}</td>

                            <td class="px-4 py-2 flex gap-2">

                                <!-- EDIT -->
                                <a href="{{ route('laporan.edit', $laporan->id) }}"
                                   class="bg-yellow-400 text-white px-3 py-1 rounded shadow">
                                    Edit
                                </a>

                                <!-- DELETE -->
                                <form action="{{ route('laporan.destroy', $laporan->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button onclick="return confirm('Yakin hapus data?')"
                                            class="bg-red-500 text-white px-3 py-1 rounded shadow">
                                        Hapus
                                    </button>
                                </form>

                            </td>
                        </tr>

                        @empty
                        <tr>
                            <td colspan="5" class="text-center py-4 text-gray-500">
                                Data belum ada
                            </td>
                        </tr>
                        @endforelse
                    </tbody>

                    @if(session('success'))
            <div class="mb-4 p-3 bg-green-100 text-green-700 rounded-lg">
                {{ session('success') }}
            </div>
@endif

                </table>
            </div>

        </div>

    </div>
</x-app-layout>