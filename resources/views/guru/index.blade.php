<x-app-layout>
    <section class="section main-section">
        <div class="card has-table">
          <header class="card-header p-2">
            <p class="card-header-title">
              <span class="icon"><i class="mdi mdi-account-multiple"></i></span>
              Data Guru
            </p>
            <a href="{{ route('guru.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white p-2 border border-blue-700 rounded">Tambah Data</a>
          </header>
          <div class="card-content">
            <table>
              <thead>
              <tr>
                <th>No</th>
                <th>Nama</th>
                <th>NIP</th>
                <th>Jenis Kelamin</th>
                <th>Telepon</th>
                <th>Alamat</th>
                <th>Aksi</th>
              </tr>
              </thead>
              <tbody>
                @if(count($guru) > 0)
                  @foreach($guru as $gr)
                    <tr>
                      <td data-label="No">{{ $guru->perPage() * ($guru->currentPage() - 1) + $loop->index + 1 }}</td>
                      <td data-label="Nama">{{ $gr->nama }}</td>
                      <td data-label="NIP">{{ $gr->no_induk }}</td>
                      <td data-label="Jk" class="capitalize">{{ $gr->jk }}</td>
                      <td data-label="Telepon">{{ $gr->telp ?? '-' }}</td>
                      <td data-label="Alamat">{{ $gr->alamat }}</td>
                      <td class="actions-cell">
                        <div class="buttons left nowrap">
                          <a href="{{ route('guru.edit', ['id' => $gr->id ]) }}" class="button small blue --jb-modal"  data-target="sample-modal-2" type="button">
                            <span class="icon"><i class="mdi mdi-pencil"></i></span>
                          </a>
                          <form action="{{ route('guru.destroy', ['id' => $gr->id]) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Yakin ingin menghapus?')" class="button small red --jb-modal" data-target="sample-modal" type="button">
                              <span class="icon"><i class="mdi mdi-trash-can"></i></span>
                            </button>
                          </form>
                        </div>
                      </td>
                    </tr>
                  @endforeach
                @else
                  <tr>
                    <td colspan="9" class="text-center font-bold py-14">
                      <span class="icon text-4xl"><i class="mdi mdi-alert-circle"></i></span>
                      <h1>Tidak ada data guru</h1>
                    </td>
                  </tr>
                @endif
              </tbody>
            </table>
            <div class="mx-3 my-3">
              {{ $guru->links() }}
            </div>
          </div>
        </div>
      </section>
</x-app-layout>