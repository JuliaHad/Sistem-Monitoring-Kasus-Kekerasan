<x-app-layout>

```
<div class="p-6">

    <div class="bg-white shadow rounded-xl p-6">

        <h1 class="text-2xl font-bold mb-6">
            Tambah Kabupaten/Kota
        </h1>

        <form action="{{ route('kabupaten-kota.store') }}"
              method="POST">

            @csrf

            <div class="mb-4">

                <label class="block mb-2">
                    Nama Kabupaten/Kota
                </label>

                <input type="text"
                       name="nama_kabupaten"
                       class="w-full border rounded-lg p-3"
                       required>

            </div>

            <button type="submit"
                    class="bg-blue-600 text-white px-4 py-2 rounded-lg">

                Simpan

            </button>

            <a href="{{ route('kabupaten-kota.index') }}"
               class="bg-gray-500 text-white px-4 py-2 rounded-lg">

                Kembali

            </a>

        </form>

    </div>

</div>
```

</x-app-layout>
