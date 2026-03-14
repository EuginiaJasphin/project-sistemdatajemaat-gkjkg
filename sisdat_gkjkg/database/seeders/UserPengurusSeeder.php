<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserPengurusSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Masukkan data ke tabel 'role'
        $roleId = DB::table('role')->insertGetId([
            'nama_role' => 'Super Admin',
            'deskripsi' => 'Akses penuh ke seluruh sistem data jemaat'
        ]);

        // 2. Buat data Jemaat untuk Admin (Karena id_jemaat di tabel users adalah NOT NULL)
        $jemaatId = DB::table('jemaat')->insertGetId([
            'nama_lengkap' => 'Administrator Sistem',
            'nama_panggilan' => 'Admin',
            'gender' => 'L',
            'status_jemaat' => 'aktif',
            // 'created_at' => now(),
        ]);

        // 3. Masukkan data ke tabel 'users'
        // Catatan: Pastikan id_jemaat sudah ada di tabel jemaat atau null jika boleh kosong
        $userId = DB::table('users')->insertGetId([
            'id_jemaat' => $jemaatId, 
            'username' => 'admin_gkjkg',
            'password' => Hash::make('admin123'),
            'status_acc' => 'aktif',
            'created_at' => now(),
        ]);

        // 4. Masukkan data ke tabel 'user_role' (Relasi)
        DB::table('user_role')->insert([
            'id_user' => $userId,
            'id_role' => $roleId
        ]);

        $this->command->info('Akun Super Admin berhasil dibuat!');
    }
}