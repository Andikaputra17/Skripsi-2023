<x-app-layout>
<div class="w-100 h-screen bg-white">
        <div class="w-100">
            <h1 class="px-8 py-4 font-bold text-lg">Tambah Dokumen</h1>
            <form class="bg-white px-8 pt-6 pb-8 w-1/2" action="{{ route('dokumen.update', ['id' => $dokumen->id]) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="kategori">
                        Kategori
                    </label>
                    <select id="kategori" class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline" name="kategori">
                        <option disabled>--Pilih Kategori--</option>
                        @foreach($kategori as $kt)
                            <option value="{{ $kt->id }}" {{ $kt->id === $dokumen->kategori_id ? 'selected' : '' }}>{{ $kt->nama }}</option>
                        @endforeach
                      </select>
                </div>
                <div class="mb-4" id="label_siswa">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="kategori">
                        Siswa
                    </label>
                    <select id="siswa" class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline" name="siswa">
                        <option disabled>--Pilih Siswa--</option>
                        @foreach($siswa as $sw)
                            <option value="{{ $sw->id }}" {{ $sw->id === $dokumen->siswa_id ? 'selected' : '' }}>{{ $sw->nama }} - {{ $sw->no_induk }}</option>
                        @endforeach
                      </select>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="nama">
                        Nama
                    </label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="nama" name="nama" type="text" placeholder="Nama" value="{{ $dokumen->nama }}">
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="deskripsi">
                        Deskripsi
                    </label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="deskripsi" name="deskripsi" type="text" placeholder="Deskripsi" value="{{ $dokumen->deskripsi }}">
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                        File
                    </label>
                    <input name="file" class="shadow appearance-none border rounded w-full py-2 px-3 mb-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="file" type="file">
                    <span>{{ $dokumen->file }}</span>
                </div>
                <div class="flex items-center gap-2">
                    <button class="bg-blue-500 hover:bg-blue-700 text-white py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                        Simpan
                    </button>
                    <a href="{{ route('dokumen.index') }}" class="bg-green-500 hover:bg-green-700 text-white py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="button">
                        Kembali
                    </a>
                </div>
            </form>
        </div>
    </div>

    @section('script')
    <script>
        document.addEventListener("DOMContentLoaded", function(event) {
            let kategori = document.querySelector('#kategori');
            let siswa = document.querySelector('#siswa');
            let label_siswa = document.querySelector('#label_siswa');

            if (kategori.value === '2' || kategori.value === '3') {
                siswa.disabled = false;
                label_siswa.style.display = 'block'
            } else {
                siswa.disabled = true;
                label_siswa.style.display = 'none'
            }
    
            kategori.addEventListener('change', function() {
                if (kategori.value === '2' || kategori.value === '3') {
                    siswa.disabled = false;
                    label_siswa.style.display = 'block'
                } else {
                    siswa.disabled = true;
                    label_siswa.style.display = 'none'
                }
            })
        })

        $(document).ready(function() {
            $('#siswa').select2();
        });
    </script>
    @endsection
</x-app-layout>