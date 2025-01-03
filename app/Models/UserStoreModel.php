<?php

namespace App\Models;

use CodeIgniter\Model;

class UserStoreModel extends Model
{
    protected $table = 'user_stores';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;

    protected $returnType = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = [
        'user_id',
        'store_id',
    ];

    // Validation
    protected $validationRules = [
        'user_id' => 'required',
        'store_id' => 'required',
    ];
    protected $validationMessages = [
        'user_id' => [
            'required' => 'User harus diisi',
        ],
        'store_id' => [
            'required' => 'Toko harus diisi',
        ],
    ];
    protected $skipValidation = false;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert = [];
    protected $beforeUpdate = [];
}
