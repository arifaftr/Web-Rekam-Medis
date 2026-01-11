<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Seeder;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create roles
        $superAdminRole = Role::firstOrCreate(['name' => 'superadmin']);
        $userRole = Role::firstOrCreate(['name' => 'user']);

        // Create permissions untuk user biasa
        $permissions = [
            'view_pasien',
            'create_pasien',
            'edit_pasien',
            'delete_pasien',
            'view_dokter',
            'create_dokter',
            'edit_dokter',
            'delete_dokter',
            'view_obat',
            'create_obat',
            'edit_obat',
            'delete_obat',
            'view_rekam_medis',
            'create_rekam_medis',
            'edit_rekam_medis',
            'delete_rekam_medis',
            'manage_users',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        // Reset cache permission
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Superadmin hanya dapat mengelola user
        $superAdminRole->syncPermissions(['manage_users']);

        // User regular mendapat permission untuk mengelola data (tidak termasuk manage_users)
        $userRole->syncPermissions([
            'view_pasien',
            'create_pasien',
            'edit_pasien',
            'delete_pasien',
            'view_dokter',
            'create_dokter',
            'edit_dokter',
            'delete_dokter',
            'view_obat',
            'create_obat',
            'edit_obat',
            'delete_obat',
            'view_rekam_medis',
            'create_rekam_medis',
            'edit_rekam_medis',
            'delete_rekam_medis',
        ]);
    }
}
