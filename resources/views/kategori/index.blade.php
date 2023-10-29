<x-app-layout>
    <section class="section main-section">
        <div class="card has-table">
          <header class="card-header p-2">
            <p class="card-header-title">
              <span class="icon"><i class="mdi mdi-apps"></i></span>
              Data Kategori
            </p>
            <a href="{{ route('kategori.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white p-2 border border-blue-700 rounded">Tambah Data</a>
          </header>
          <div class="card-content">
            <table>
              <thead>
              <tr>
                <th>No</th>
                <th>Nama Kategori</th>
                <th>Admin</th>
                <th>Aksi</th>
              </tr>
              </thead>
              <tbody>
                @if(count($kategori) > 0)
                  @foreach($kategori as $ktg)
                  <tr>
                    <td data-label="no">{{ $kategori->perPage() * ($kategori->currentPage() - 1) + $loop->index + 1 }}</td>
                    <td data-label="nama">{{ $ktg->nama }}</td>
                    <td data-label="nama">{{ $ktg->user->nama }}</td>
                    <td class="actions-cell">
                      <div class="buttons left nowrap">
                        <a href="{{ route('kategori.edit', ['id' => $ktg->id ]) }}" class="button small blue --jb-modal"  data-target="sample-modal-2" type="button">
                          <span class="icon"><i class="mdi mdi-pencil"></i></span>
                        </a>
                        <form action="{{ route('kategori.destroy', ['id' => $ktg->id]) }}" method="post">
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
                      <h1>Tidak ada data kategori</h1>
                    </td>
                  </tr>
                @endif
              </tbody>
            </table>
            <div class="mx-3 my-3">
              {{ $kategori->links() }}
            </div>
          </div>
        </div>
      </section>
</x-app-layout>