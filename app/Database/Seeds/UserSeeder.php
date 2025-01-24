<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $users = [
            [
                'username' => 'superadmin',
                'name' => 'Super Admin',
                'email' => 'superadmin@gmail.com',
                'password' => password_hash('superadmin2024', PASSWORD_DEFAULT),
                'role_id' => 1,
            ],
            [
                'username' => 'admin',
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'password' => password_hash('admin', PASSWORD_DEFAULT),
                'role_id' => 2,
            ],
            [
                'username' => 'komunitas',
                'name' => 'Komunitas',
                'email' => 'komunitas@gmail.com',
                'password' => password_hash('komunitas2024', PASSWORD_DEFAULT),
                'role_id' => 3,
            ],
        ];

        foreach ($users as $user) {
            $this->db->table('users')->insert($user);
        }
    }
}
