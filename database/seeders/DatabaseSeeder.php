<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    // Pegawai = Gptu22ks
    // Siswa = Sdn22dp

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::create([
            'no_induk' => '1908718210',
            'nama' => 'Dede Andika',
            'telp' => '089671654666',
            'email' => 'decil@gmail.com',
            'password' => Hash::make('Gptu22ks'),
            'email_verified_at' => now(),
            'jk' => 'laki-laki',
            'tahun_masuk' => '2020',
            'alamat' => 'Jalan Suli Denpasar',
            'level' => 'admin'
        ]);

        \App\Models\Kategori::insert([
            [
                'nama' => 'Surat Izin',
                'user_id' => '1',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nama' => 'Raport',
                'user_id' => '1',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nama' => 'Buku Induk Siswa',
                'user_id' => '1',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nama' => 'Ijazah',
                'user_id' => '1',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nama' => 'Sertifikat',
                'user_id' => '1',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nama' => 'Berkas Internal',
                'user_id' => '1',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nama' => 'Berkas Kesehatan',
                'user_id' => '1',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nama' => 'Arsip Umum',
                'user_id' => '1',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nama' => 'Surat Keputusan',
                'user_id' => '1',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nama' => 'Berkas Kerja',
                'user_id' => '1',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nama' => 'Surat Keluar',
                'user_id' => '1',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nama' => 'Surat Masuk',
                'user_id' => '1',
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
        

    }
}
