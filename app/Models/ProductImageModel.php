<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductImageModel extends Model
{
    protected $table            = 'product_images';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'image',
        'product_id',
        'store_id',
    ];

    // Dates
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    // Validation
    protected $validationRules      = [
        'image' => 'required',
        'product_id' => 'required',
    ];
    protected $validationMessages   = [
        'image' => [
            'required' => 'Gambar wajib diisi',
        ],
        'product_id' => [
            'required' => 'Produk wajib diisi',
        ],
    ];
    protected $skipValidation       = false;
}
