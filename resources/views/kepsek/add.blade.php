<x-app-layout>
    <div class="w-100 h-screen bg-white">
        <div class="w-100">
            <h1 class="px-8 py-4 font-bold text-lg">Tambah Kepala Sekolah</h1>
            <form class="bg-white px-8 pt-6 pb-8 w-1/2" action="{{ route('kepalasekolah.store') }}" method="post">
                @csrf
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="nama">
                        Nama Lengkap
                    </label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="nama" name="nama" type="text" placeholder="Masukan nama" value={{ old('nama') }}>
                    @error('nama')
                        <p class="text-red-600 text-sm">{!! $message !!}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="nama">
                        Nomor Induk Pegawai
                    </label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="no_induk" name="no_induk" type="number" value="{{ old('no_induk') }}" placeholder="Masukan NIP">
                    @error('no_induk')
                        <p class="text-red-600 text-sm">{!! $message !!}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="nama">
                        Jenis Kelamin
                    </label>
                    <select class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="jk" id="jk">
                        <option value="laki-laki">Laki-Laki</option>
                        <option value="perempuan">Perempuan</option>
                    </select>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="nama">
                        Tahun Masuk
                    </label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="tahun_masuk" name="tahun_masuk" type="number" placeholder="Masukan Tahun Masuk" value={{ old('tahun_masuk') }}>
                    @error('tahun_masuk')
                        <p class="text-red-600 text-sm">{!! $message !!}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="nama">
                        Alamat
                    </label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="alamat" name="alamat" type="text" placeholder="Masukan alamat" value={{ old('alamat') }}>
                    @error('alamat')
                        <p class="text-red-600 text-sm">{!! $message !!}</p>
                    @enderror
                </div>
                <div class="flex items-center gap-2">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="button">
                        Simpan
                    </button>
                    <a href="{{ route('kepalasekolah.index') }}" class="bg-green-500 hover:bg-green-700 text-white py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="button">
                        Kembali
                    </a>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>