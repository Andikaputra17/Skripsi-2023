
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('no_induk')->unique();
            $table->string('nisn')->nullable()->unique();
            $table->string('nama');
            $table->string('email')->unique()->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('telp')->nullable();
            $table->enum('jk', ['laki-laki', 'perempuan']);
            $table->string('alamat');
            $table->string('tahun_masuk');
            $table->string('password');
            $table->enum('level', ['kepala sekolah', 'tata usaha', 'guru', 'pegawai', 'admin', 'siswa']);
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
