<?php

namespace Database\Seeders;
use App\Models\Mahasiswa;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::where('role_name', 'Student')->get();

        foreach ($users as $user) {
            // Periksa apakah data sudah ada sebelumnya
            $existingMahasiswa = Mahasiswa::where('user_id', $user->id)->first();

            if (!$existingMahasiswa) {
                Mahasiswa::create([
                    'user_id' => $user->id,
                    'name_full' => $user->name,
                    // Tambahkan kolom-kolom lain sesuai kebutuhan
                ]);
            }
        }
    }
}
