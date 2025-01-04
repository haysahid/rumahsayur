<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class UserController extends BaseController
{
    public function index()
    {
        $userModel = model('UserModel');
        $users = $userModel->findAll();

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
}
