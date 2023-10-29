<x-app-layout>
    <div class="w-100 h-screen bg-white">
        <div class="w-100">
            <h1 class="px-8 py-4 font-bold text-lg">Edit Kategori</h1>
            <form class="bg-white px-8 pt-6 pb-8 w-1/2" action="{{ route('kategori.update', ['id' => $kategori->id]) }}" method="post">
                @method('PUT')
                @csrf
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="nama">
                        Nama Kategori
                    </label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="nama" name="nama" type="text" value="{{ old('nama', $kategori->nama) }}">
                    @error('nama')
                        <p class="text-red-600 text-sm">{!! $message !!}</p>
                    @enderror
                </div>
                <div class="flex items-center gap-2">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="button">
                        Simpan
                    </button>
                    <a href="{{ route('kategori.index') }}" class="bg-green-500 hover:bg-green-700 text-white py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="button">
                        Kembali
                    </a>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>