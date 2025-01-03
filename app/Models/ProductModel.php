<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductModel extends Model
{
    protected $table = 'products';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;

    protected $returnType = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = [
        'name',
        'description',
        'purchase_price',
        'selling_price',
        'initial_stock',
        'unit',
        'category',
        'expired_at',
        'store_id',
    ];

    // Dates
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deleted_at';

    // Validation
    protected $validationRules = [
        'name' => 'required',
        'description' => 'required',
        'purchase_price' => 'required',
        'selling_price' => 'required',
        'initial_stock' => 'required',
        'unit' => 'required',
        'category' => 'nullable',
        'expired_at' => 'nullable',
        'store_id' => 'required',
    ];
    protected $validationMessages = [
        'name' => [
            'required' => 'Nama produk harus diisi',
        ],
        'description' => [
            'required' => 'Deskripsi produk harus diisi',
        ],
        'purchase_price' => [
            'required' => 'Harga beli produk harus diisi',
        ],
        'selling_price' => [
            'required' => 'Harga jual produk harus diisi',
        ],
        'initial_stock' => [
            'required' => 'Stok awal produk harus diisi',
        ],
        'unit' => [
            'required' => 'Satuan produk harus diisi',
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

    // Relationships
    public function reviews()
    {
        return $this->hasMany(ReviewModel::class, 'product_id', 'id');
    }
}
