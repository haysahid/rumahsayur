<?php

namespace App\Models;

use CodeIgniter\Model;

class RoleModel extends Model
{
    protected $table = 'roles';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;

    protected $returnType = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = [
        'name',
    ];

    // Validation
    protected $validationRules = [
        'name' => 'required',
    ];
    protected $validationMessages = [
        'name' => [
            'required' => 'Nama role harus diisi',
        ],
    ];
    protected $skipValidation = false;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert = [];
    protected $beforeUpdate = [];
}
