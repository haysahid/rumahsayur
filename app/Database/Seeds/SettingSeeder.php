<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SettingSeeder extends Seeder
{
    public function run()
    {
        $settings = [
            [
                'key' => 'app_name',
                'value' => 'Rumah Sayur',
            ],
            [
                'key' => 'app_description',
                'value' => 'Toko Sayur Terlengkap di Sleman',
            ],
            [
                'key' => 'app_logo',
                'value' => 'app_logo.png',
            ],

        ];

        foreach ($settings as $setting) {
            $this->db->table('settings')->insert($setting);
        }
    }
}
