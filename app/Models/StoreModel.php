<?php

namespace App\Models;

use CodeIgniter\Model;

class StoreModel extends Model
{
    protected $table = 'stores';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;

    protected $returnType = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = [
        'name',
        'address',
        'phone',
    ];

    // Dates
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deleted_at';

    // Validation
    protected $validationRules = [
        'name' => 'required',
        'address' => 'required',
        'phone' => 'required',
    ];
    protected $validationMessages = [
        'name' => [
            'required' => 'Nama toko harus diisi',
        ],
        'address' => [
            'required' => 'Alamat toko harus diisi',
        ],
        'phone' => [
            'required' => 'Nomor telepon toko harus diisi',
        ],
    ];
    protected $skipValidation = false;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert = [];
    protected $beforeUpdate = [];
}
