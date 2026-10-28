<x-app-layout>

```
<div class="p-6">

    <div class="bg-white shadow rounded-xl p-6">

        <h1 class="text-2xl font-bold mb-6">
            Edit Kabupaten/Kota
        </h1>

        <form action="{{ route('kabupaten-kota.update', $kabupatenKota->id) }}"
              method="POST">

            @csrf
            @method('PUT')

            <div class="mb-4">

                <label class="block mb-2">
                    Nama Kabupaten/Kota
                </label>

                <input type="text"
                       name="nama_kabupaten"
                       value="{{ $kabupatenKota->nama_kabupaten }}"
                       class="w-full border rounded-lg p-3"
                       required>

            </div>

            <button type="submit"
                    class="bg-yellow-500 text-white px-4 py-2 rounded-lg">

                Update

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
