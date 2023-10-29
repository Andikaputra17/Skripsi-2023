<x-app-layout>
    <section class="section main-section">
        <div class="grid gap-6 grid-cols-1 md:grid-cols-3 mb-6">

            @if ($level === 'admin')
            <div class="card">
                <div class="card-content">
                    <div class="flex items-center justify-between">
                        <div class="widget-label">
                            <h3>
                                Pegawai
                            </h3>
                            <h1>
                                {{ $pegawai }}
                            </h1>
                        </div>
                        <span class="icon widget-icon text-green-500"><i
                                class="mdi mdi-account-multiple mdi-48px"></i></span>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-content">
                    <div class="flex items-center justify-between">
                        <div class="widget-label">
                            <h3>
                                Guru
                            </h3>
                            <h1>
                                {{ $guru }}
                            </h1>
                        </div>
                        <span class="icon widget-icon text-blue-500"><i
                            class="mdi mdi-account-multiple mdi-48px"></i></span>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-content">
                    <div class="flex items-center justify-between">
                        <div class="widget-label">
                            <h3>
                                Tata Usaha
                            </h3>
                            <h1>
                                {{ $tu }}
                            </h1>
                        </div>
                        <span class="icon widget-icon text-red-500"><i class="mdi mdi-account-multiple mdi-48px"></i></span>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-content">
                    <div class="flex items-center justify-between">
                        <div class="widget-label">
                            <h3>
                                Kepala Sekolah
                            </h3>
                            <h1>
                                {{ $kepsek }}
                            </h1>
                        </div>
                        <span class="icon widget-icon text-sky-500"><i class="mdi mdi-account-multiple mdi-48px"></i></span>
                    </div>
                </div>
            </div>
            @endif

            @if ($level === 'siswa' || $level === 'guru')
            <div class="card">
                <div class="card-content">
                    <div class="flex items-center justify-between">
                        <div class="widget-label">
                            <h3>
                                Siswa
                            </h3>
                            <h1>
                                {{ $siswa }}
                            </h1>
                        </div>
                        <span class="icon widget-icon text-yellow-500"><i class="mdi mdi-account-multiple mdi-48px"></i></span>
                    </div>
                </div>
            </div>
            @endif

            @if ($level === 'guru' || $level === 'admin')
            <div class="card">
                <div class="card-content">
                    <div class="flex items-center justify-between">
                        <div class="widget-label">
                            <h3>
                                Kategori
                            </h3>
                            <h1>
                                {{ $kategori }}
                            </h1>
                        </div>
                        <span class="icon widget-icon text-gray-500"><i class="mdi mdi-apps mdi-48px"></i></span>
                    </div>
                </div>
            </div>
            @endif

            @if ($level === 'kepala sekolah' || $level === 'siswa' || $level === 'guru' || $level === 'pegawai' || $level === 'tata usaha')
            <div class="card">
                <div class="card-content">
                    <div class="flex items-center justify-between">
                        <div class="widget-label">
                            <h3>
                                Dokumen
                            </h3>
                            <h1>
                                {{ $dokumen }}
                            </h1>
                        </div>
                        <span class="icon widget-icon text-purple-500"><i class="mdi mdi-file-document mdi-48px"></i></span>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </section>




</x-app-layout>
