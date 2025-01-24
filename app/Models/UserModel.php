<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;

    protected $returnType = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = [
        'name',
        'username',
        'email',
        'password',
        'phone',
        'address',
        'avatar',
        'role_id',
        'disabled_at',
    ];

    // Dates
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';

    // Validation
    protected $validationRules = [
        'name' => 'required',
        'username' => 'required|is_unique[users.username,id,{id}]',
        'email' => 'required|valid_email|is_unique[users.email,id,{id}]',
        'password' => 'required|min_length[8]',
        'role_id' => 'required',
    ];
    protected $validationMessages = [
        'username' => [
            'required' => 'Username harus diisi',
            'is_unique' => 'Username sudah terdaftar',
        ],
        'email' => [
            'required' => 'Email harus diisi',
            'valid_email' => 'Email tidak valid',
            'is_unique' => 'Email sudah terdaftar',
        ],
        'password' => [
            'required' => 'Password harus diisi',
            'min_length' => 'Password minimal 8 karakter',
        ],
        'role_id' => [
            'required' => 'Role harus diisi',
        ],
    ];
    protected $skipValidation = false;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert = ['hashPassword'];
    protected $beforeUpdate = ['hashPassword'];
    protected $afterDelete = ['deleteAvatar'];
    protected $beforeFind = [];
    protected $afterFind = [];
    protected $afterInsert = [];
    protected $afterUpdate = [];
    protected $afterSave = [];

    protected function hashPassword(array $data)
    {
        if (!isset($data['data']['password'])) {
            return $data;
        }

        $data['data']['password'] = password_hash($data['data']['password'], PASSWORD_DEFAULT);

        return $data;
    }

    protected function deleteAvatar(array $data)
    {
        if (!empty($data['avatar'])) {
            unlink('assets/img/' . $data['avatar']);
        }

        return $data;
    }

    // Relationships
    public function role()
    {
        return $this->belongsTo(RoleModel::class, 'role_id', 'id');
    }

    public function stores()
    {
        return $this->belongsToMany(StoreModel::class, 'user_stores', 'user_id', 'store_id');
    }

    // Methods
    public function getUserByEmail($email)
    {
        return $this->where(['email' => $email])->first();
    }
}
