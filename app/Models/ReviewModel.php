<?php

namespace App\Models;

use CodeIgniter\Model;

class ReviewModel extends Model
{
    protected $table = 'reviews';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;

    protected $returnType = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = [
        'rating',
        'comment',
        'user_id',
        'store_id',
    ];

    // Dates
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules = [
        'rating' => 'required',
        'comment' => 'nullable',
        'user_id' => 'required',
        'store_id' => 'required',
    ];
    protected $validationMessages = [
        'rating' => [
            'required' => 'Rating harus diisi',
        ],
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
