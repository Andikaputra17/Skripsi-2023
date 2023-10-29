<x-app-layout>
    <section class="section main-section">
        <div class="card has-table">
          <header class="card-header p-2">
            <p class="card-header-title">
              <span class="icon"><i class="mdi mdi-account-multiple"></i></span>
              Data Tata Usaha
            </p>
            <a href="{{ route('tatausaha.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white p-2 border border-blue-700 rounded">Tambah Data</a>
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
                @if(count($tatausaha) > 0)
                  @foreach($tatausaha as $tu)
                    <tr>
                      <td data-label="No">{{ $tatausaha->perPage() * ($tatausaha->currentPage() - 1) + $loop->index + 1 }}</td>
                      <td data-label="Nama">{{ $tu->nama }}</td>
                      <td data-label="NIP">{{ $tu->no_induk }}</td>
                      <td data-label="Jk" class="capitalize">{{ $tu->jk }}</td>
                      <td data-label="Telepon">{{ $tu->telp ?? '-'}}</td>
                      <td data-label="Alamat">{{ $tu->alamat }}</td>
                      <td class="actions-cell">
                        <div class="buttons left nowrap">
                          <a href="{{ route('tatausaha.edit', ['id' => $tu->id ]) }}" class="button small blue --jb-modal"  data-target="sample-modal-2" type="button">
                            <span class="icon"><i class="mdi mdi-pencil"></i></span>
                          </a>
                          <form action="{{ route('tatausaha.destroy', ['id' => $tu->id]) }}" method="post">
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
                      <h1>Tidak ada data tata usaha</h1>
                    </td>
                  </tr>
                @endif
              </tbody>
            </table>
            <div class="mx-3 my-3">
              {{ $tatausaha->links() }}
            </div>
          </div>
        </div>
      </section>
</x-app-layout>