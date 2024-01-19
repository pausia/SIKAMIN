<?php

namespace Database\Seeders;
use App\Models\Dosen;
use App\Models\User;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DosenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::where('role_name', 'Dosen')->get();

        foreach ($users as $user) {
            // Periksa apakah data sudah ada sebelumnya
            $existingDosen = Dosen::where('user_id', $user->id)->first();

            if (!$existingDosen) {
                Dosen::create([
                    'user_id' => $user->id,
                    'name_full' => $user->name,
                    // Tambahkan kolom-kolom lain sesuai kebutuhan
                ]);
            }
        }
    }
}
