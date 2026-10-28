<x-app-layout>

```
<div class="p-6">

    <div class="flex justify-between items-center mb-6">

        <div>
            <h1 class="text-3xl font-bold text-slate-800">
                Data Kabupaten / Kota
            </h1>

            <p class="text-gray-500">
                Master Data Kabupaten dan Kota Kalimantan Selatan
            </p>
        </div>

        <a href="{{ route('kabupaten-kota.create') }}"
           class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
            + Tambah Data
        </a>

    </div>

    @if(session('success'))
        <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white shadow rounded-xl overflow-hidden">

        <table class="w-full">

            <thead class="bg-slate-100">

                <tr>
                    <th class="p-3 text-left">No</th>
                    <th class="p-3 text-left">Nama Kabupaten/Kota</th>
                    <th class="p-3 text-center">Aksi</th>
                </tr>

            </thead>

            <tbody>

                @forelse($kabupatenKotas as $item)

                    <tr class="border-b">

                        <td class="p-3">
                            {{ $loop->iteration }}
                        </td>

                        <td class="p-3">
                            {{ $item->nama_kabupaten }}
                        </td>

                        <td class="p-3 text-center">

                            <a href="{{ route('kabupaten-kota.edit', $item->id) }}"
                               class="bg-yellow-500 text-white px-3 py-1 rounded">
                                Edit
                            </a>

                            <form action="{{ route('kabupaten-kota.destroy', $item->id) }}"
                                  method="POST"
                                  class="inline">

                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                        onclick="return confirm('Yakin ingin menghapus data?')"
                                        class="bg-red-600 text-white px-3 py-1 rounded">

                                    Hapus

                                </button>

                            </form>

                        </td>

                    </tr>

                @empty

                    <tr>
                        <td colspan="3" class="text-center p-5">
                            Data belum tersedia
                        </td>
                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>
```

</x-app-layout>
