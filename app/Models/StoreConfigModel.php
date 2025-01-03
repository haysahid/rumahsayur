<?php

namespace App\Models;

use CodeIgniter\Model;

class StoreConfigModel extends Model
{
    protected $table = 'store_configs';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;

    protected $returnType = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = [
        'store_id',
        'key',
        'value',
    ];

    // Validation
    protected $validationRules = [
        'store_id' => 'required',
        'key' => 'required',
        'value' => 'required',
    ];
    protected $validationMessages = [
        'store_id' => [
            'required' => 'Toko harus diisi',
        ],
        'key' => [
            'required' => 'Kunci konfigurasi harus diisi',
        ],
        'value' => [
            'required' => 'Nilai konfigurasi harus diisi',
        ],
    ];
    protected $skipValidation = false;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert = [];
    protected $beforeUpdate = [];
}
