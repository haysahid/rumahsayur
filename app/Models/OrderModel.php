<?php

namespace App\Models;

use CodeIgniter\Model;

class OrderModel extends Model
{
    protected $table = 'orders';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;

    protected $returnType = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = [
        'code',
        'payment',
        'note',
        'address',
        'status',
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
        'code' => 'required',
        'payment' => 'required',
        'note' => 'nullable',
        'address' => 'nullable',
        'status' => 'required',
        'user_id' => 'required',
        'store_id' => 'required',
    ];
    protected $validationMessages = [
        'code' => [
            'required' => 'Kode order harus diisi',
        ],
        'payment' => [
            'required' => 'Pembayaran harus diisi',
        ],
        'status' => [
            'required' => 'Status order harus diisi',
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
    protected $beforeInsert = ['generateCode'];
    protected $beforeUpdate = [];

    protected function generateCode(array $data)
    {
        $data['data']['code'] = 'ORD' . date('Ymd') . strtoupper(substr(uniqid(), 7));
        return $data;
    }

    // Relationships
    public function orderItems()
    {
        return $this->hasMany(OrderItemModel::class, 'order_id', 'id');
    }
}
