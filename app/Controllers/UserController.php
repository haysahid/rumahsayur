<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class UserController extends BaseController
{
    public function index()
    {
        $userModel = model('UserModel');
        $users = $userModel->where('disabled_at', null)->findAll();

        // Get Roles
        for ($i = 0; $i < count($users); $i++) {
            $roleModel = model('RoleModel');
            $role = $roleModel->find($users[$i]['role_id']);
            $users[$i]['role'] = $role;
        }

        return view('user', [
            'users' => $users,
        ]);
    }

    public function delete($id)
    {
        $userModel = model('UserModel');
        $userModel->update($id, ['disabled_at' => date('Y-m-d H:i:s')]);

        return redirect()->to(base_url('user') . '?success=User berhasil dihapus');
    }
}
