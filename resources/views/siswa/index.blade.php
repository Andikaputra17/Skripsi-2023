<x-app-layout>
    <section class="section main-section">
        <div class="card has-table">
          <header class="card-header p-2">
            <p class="card-header-title">
              <span class="icon"><i class="mdi mdi-account-multiple"></i></span>
              Data Siswa
            </p>
            @if($level === 'guru')
            <a href="{{ route('siswa.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white p-2 border border-blue-700 rounded">Tambah Data</a>
            @endif
          </header>
          <div class="card-content">
            <table>
              <thead>
              <tr>
                <th>No</th>
                <th>Nama</th>
                <th>NIS</th>
                <th>NISN</th>
                <th>Jenis Kelamin</th>
                <th>Tahun Masuk</th>
                <th>Telepon</th>
                <th>Alamat</th>
                @if($level === 'guru')
                <th>Aksi</th>
                @endif
              </tr>
              </thead>
              <tbody>
                @if(count($siswa) > 0)
                  @foreach($siswa as $sw)
                    <tr>
                      <td data-label="No">{{ $siswa->perPage() * ($siswa->currentPage() - 1) + $loop->index + 1 }}</td>
                      <td data-label="Nama">{{ $sw->nama }}</td>
                      <td data-label="NIS">{{ $sw->no_induk }}</td>
                      <td data-label="NISN">{{ $sw->nisn }}</td>
                      <td data-label="Jk" class="capitalize">{{ $sw->jk }}</td>
                      <td data-label="Tahun Masuk">{{ $sw->tahun_masuk }}</td>
                      <td data-label="Telepon">{{ $sw->telp ?? '-' }}</td>
                      <td data-label="Alamat">{{ $sw->alamat }}</td>
                      @if($level === 'guru')
                      <td class="actions-cell">
                        <div class="buttons left nowrap">
                          <a href="{{ route('siswa.edit', ['id' => $sw->id ]) }}" class="button small blue --jb-modal"  data-target="sample-modal-2" type="button">
                            <span class="icon"><i class="mdi mdi-pencil"></i></span>
                          </a>
                          <form action="{{ route('siswa.destroy', ['id' => $sw->id]) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Yakin ingin menghapus?')" class="button small red --jb-modal" data-target="sample-modal" type="button">
                              <span class="icon"><i class="mdi mdi-trash-can"></i></span>
                            </button>
                          </form>
                        </div>
                      </td>
                      @endif
                    </tr>
                  @endforeach
                @else
                  <tr>
                    <td colspan="9" class="text-center font-bold py-14">
                      <span class="icon text-4xl"><i class="mdi mdi-alert-circle"></i></span>
                      <h1>Tidak ada data siswa</h1>
                    </td>
                  </tr>
                @endif
              </tbody>
            </table>
            <div class="mx-3 my-3">
              {{ $siswa->links() }}
            </div>
          </div>
        </div>
      </section>
</x-app-layout>