<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class StoreSeeder extends Seeder
{
    public function run()
    {
        $stores = [
            [
                'name' => 'Rumah Sayur',
                'address' => 'Sleman, DI Yogyakarta',
                'phone' => '081234567890',
            ],
        ];

        foreach ($stores as $store) {
            $this->db->table('stores')->insert($store);
        }

        $userStores = [
            [
                'user_id' => 2,
                'store_id' => 1,
            ],
        ];

        foreach ($userStores as $userStore) {
            $this->db->table('user_stores')->insert($userStore);
        }
    }
}
