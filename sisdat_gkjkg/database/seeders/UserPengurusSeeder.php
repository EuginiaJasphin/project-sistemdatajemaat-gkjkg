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

        // 2. Masukkan data ke tabel 'users'
        // Catatan: Pastikan id_jemaat sudah ada di tabel jemaat atau null jika boleh kosong
        $userId = DB::table('users')->insertGetId([
            'username' => 'admin_gkjkg',
            'password' => Hash::make('admin123'), // Password terenkripsi
            'status_acc' => 'aktif',
            'created_at' => now(),
        ]);

        // 3. Masukkan data ke tabel 'user_role' (Relasi)
        DB::table('user_role')->insert([
            'id_user' => $userId,
            'id_role' => $roleId
        ]);

        $this->command->info('Akun Super Admin berhasil dibuat!');
    }
}