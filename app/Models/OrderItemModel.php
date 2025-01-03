<?php

namespace App\Models;

use CodeIgniter\Model;

class OrderItemModel extends Model
{
    protected $table = 'order_items';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;

    protected $returnType = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = [
        'quantity',
        'item_price',
        'order_id',
        'product_id',
        'store_id',
    ];

    // Dates
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules = [
        'quantity' => 'required',
        'item_price' => 'required',
        'order_id' => 'required',
        'product_id' => 'required',
        'store_id' => 'required',
    ];
    protected $validationMessages = [
        'quantity' => [
            'required' => 'Jumlah harus diisi',
        ],
        'item_price' => [
            'required' => 'Harga harus diisi',
        ],
        'order_id' => [
            'required' => 'Pesanan harus diisi',
        ],
        'product_id' => [
            'required' => 'Produk harus diisi',
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
    public function order()
    {
        return $this->belongsTo(OrderModel::class, 'order_id');
    }
}
