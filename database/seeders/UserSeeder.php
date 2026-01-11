<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Pastikan role sudah ada
        $superadminRole = Role::firstOrCreate(['name' => 'superadmin']);
        $userRole = Role::firstOrCreate(['name' => 'user']);

        // ======================
        // Buat superadmin
        // ======================
        $admin = User::updateOrCreate(
            ['email' => 'admin4@gmail.com'], // Cek user berdasarkan email
            [
                'name' => 'Admin4',
                'password' => Hash::make('12345678'),
            ]
        );

        // Assign role superadmin
        if (! $admin->hasRole('superadmin')) {
            $admin->syncRoles(['superadmin']); // syncRoles = hapus role lama, set role baru
        }

        // ======================
        // Buat user biasa
        // ======================
        $user = User::updateOrCreate(
            ['email' => 'kelompok4@gmail.com'],
            [
                'name' => 'Kelompok 4',
                'password' => Hash::make('12345678'),
            ]
        );

        // Assign role user
        if (! $user->hasRole('user')) {
            $user->syncRoles(['user']);
        }
    }
}
