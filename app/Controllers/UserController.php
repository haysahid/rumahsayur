<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class UserController extends BaseController
{
    public function index()
    {
        // Check session
        if (!session()->get('id')) {
            return redirect()->to(base_url('login'));
        }

        // Check role
        if (session()->get('role_id') > 2) {
            return redirect()->to(base_url('/'));
        }

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

    public function updateView($id)
    {
        // Check session
        if (!session()->get('id')) {
            return redirect()->to(base_url('login'));
        }

        // Check role
        if (session()->get('role_id') > 2) {
            return redirect()->to(base_url('/'));
        }

        $userModel = model('UserModel');
        $user = $userModel->find($id);

        return view('user_update', [
            'user' => $user,
        ]);
    }

    public function update($id)
    {
        // Check session
        if (!session()->get('id')) {
            return redirect()->to(base_url('login'));
        }

        // Check role
        if (session()->get('role_id') > 2) {
            return redirect()->to(base_url('/'));
        }

        $userModel = model('UserModel');
        $user = [
            'name' => $this->request->getPost('name'),
            'username' => $this->request->getPost('username'),
            'email' => $this->request->getPost('email'),
            'password' => $this->request->getPost('password'),
            'phone' => $this->request->getPost('phone'),
            'address' => $this->request->getPost('address'),
            'role_id' => $this->request->getPost('role_id'),
        ];

        if ($this->request->getPost('password') == '') {
            unset($user['password']);
        }

        try {
            $result = $userModel->skipValidation(true)->update($id, $user);

            if (!$result) {
                return redirect()->to(base_url('user/update/' . $id) . '?error=User gagal diubah.')->withInput();
            }

            return redirect()->to(base_url('user') . '?success=User berhasil diubah');
        } catch (\Exception $e) {
            return redirect()->to(base_url('user/update/' . $id) . '?error=User gagal diubah' . $e->getMessage())->withInput();
        }
    }

    public function delete($id)
    {
        // Check session
        if (!session()->get('id')) {
            return redirect()->to(base_url('login'));
        }

        // Check role
        if (session()->get('role_id') > 2) {
            return redirect()->to(base_url('/'));
        }

        $userModel = model('UserModel');
        $userModel->update($id, ['disabled_at' => date('Y-m-d H:i:s')]);

        return redirect()->to(base_url('user') . '?success=User berhasil dihapus');
    }
}
