<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class RoleSeeder extends Seeder
{
    public function run()
    {
        $roles = [
            'Super Admin',
            'Admin',
            'Komunitas',
            'Pemilik Toko',
            'Karyawan Toko',
            'Tamu',
        ];

        foreach ($roles as $role) {
            $this->db->table('roles')->insert(['name' => $role]);
        }
    }
}
