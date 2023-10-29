<x-app-layout>
  @section('css')
    <style>
      .truncate {
        white-space: nowrap;
        width: 100px !important;
        overflow: hidden;
        text-overflow: ellipsis;
      }
    </style> 
  @endsection
    <section class="section main-section">
        <div class="card has-table">
          <header class="card-header p-2">
            <p class="card-header-title">
              <span class="icon"><i class="mdi mdi-account-multiple"></i></span>
              Data Dokumen
            </p>
            <div class="navbar-item flex justify-start">
              <form action="{{ route('dokumen.search') }}" method="get" class="control">
                <input type="text" name="search" value="{{ $search ?? '' }}" placeholder="Search everywhere..." class="input">
              </form>
            </div>
            @if($level === 'guru' || $level === 'pegawai' || $level === 'kepala sekolah' || $level === 'tata usaha')
              <a href="{{ route('dokumen.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white p-2 border border-blue-700 rounded">Tambah Data</a>
            @endif
          </header>
          <div class="card-content">
            <table>
              <thead>
              <tr>
                <th>No</th>
                <th>No</th>
                <th>Nama</th>
                <th>Kategori</th>
                <th>Upload</th>
                <th>Update</th>
                <th>Admin</th>
                <th>File</th>
                @if($level === 'guru' || $level === 'pegawai' || $level === 'kepala sekolah' || $level === 'tata usaha' || $level === 'siswa')
                  <th>Aksi</th>
                @endif
              </tr>
              </thead>
              <tbody>
                @if(count($dokumen) > 0)
                  @foreach($dokumen as $dok)
                    <tr>
                      <td data-label="No">{{ $dokumen->perPage() * ($dokumen->currentPage() - 1) + $loop->index + 1 }}</td>
                      <td data-label="No">{{ $dok->no }}</td>
                      <td data-label="Nama">{{ $dok->nama }}</td>
                      <td data-label="Kategori">{{ $dok->kategori->nama }}</td>
                      <td data-label="Upload">{{ \Carbon\Carbon::parse($dok->created_at)->diffForHumans() }}</td>
                      <td data-label="Update">{{ \Carbon\Carbon::parse($dok->updated_at)->diffForHumans() }}</td>
                      <td data-label="Admin">{{ $dok->user->nama }}</td>
                      <td data-label="File">
                          <span class="mdi mdi-file-pdf-box" style="color:red; font-size: 2em;"></span>
                          <p class="truncate">{{ $dok->file }}</p>
                      </td>
                      <td class="actions-cell">
                        <div class="buttons left nowrap">
                          <a href="{{ route('dokumen.download', ['value' => $dok->file ]) }}" class="button small bg-yellow-500 --jb-modal"  data-target="sample-modal-2" type="button">
                            <span class="icon"><i class="mdi mdi-download text-white"></i></span>
                          </a>
                          @if($level === 'guru' || $level === 'pegawai' || $level === 'kepala sekolah' || $level === 'tata usaha')
                          <a href="{{ route('dokumen.edit', ['id' => $dok->id ]) }}" class="button small blue --jb-modal"  data-target="sample-modal-2" type="button">
                            <span class="icon"><i class="mdi mdi-pencil"></i></span>
                          </a>
                          <form action="{{ route('dokumen.destroy', ['id' => $dok->id]) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Yakin ingin menghapus?')" class="button small red --jb-modal" data-target="sample-modal" type="button">
                              <span class="icon"><i class="mdi mdi-trash-can"></i></span>
                            </button>
                          </form>
                          @endif
                        </div>
                      </td>
                    </tr>
                  @endforeach
                @else
                  <tr>
                    <td colspan="9" class="text-center font-bold py-14">
                      <span class="icon text-4xl"><i class="mdi mdi-alert-circle"></i></span>
                      <h1>Tidak ada data dokumen</h1>
                    </td>
                  </tr>
                @endif
              </tbody>
            </table>
            <div class="mx-3 my-3">
              {{ $dokumen->links() }}
            </div>
          </div>
        </div>
      </section>
</x-app-layout>