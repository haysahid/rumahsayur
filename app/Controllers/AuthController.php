<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class AuthController extends BaseController
{
    public function loginView()
    {
        return view('login');
    }

    public function login()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $userModel = model('UserModel');

        $user = $userModel->where('username', $username)->first();

        if (!$user) {
            return redirect()->to(base_url('login') . '?error=Pengguna tidak ditemukan')->withInput();
        }

        if (!password_verify($password, $user['password'])) {
            return redirect()->to(base_url('login')  . '?error=Pengguna tidak ditemukan')->withInput();
        }

        // Set session
        session()->set([
            'id' => $user['id'],
            'username' => $user['username'],
            'name' => $user['name'],
            'role_id' => $user['role_id'],
        ]);

        if ($user['role_id'] == 1 || $user['role_id'] == 2) {
            return redirect()->to(base_url('dashboard'));
        }

        return redirect()->to(base_url('/'));
    }

    public function registerView()
    {
        return view('register');
    }

    public function register()
    {
        $name = $this->request->getPost('name');
        $username = $this->request->getPost('username');
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');
        $phone = $this->request->getPost('phone');
        $address = $this->request->getPost('address');
        $role_id = 6;

        $userModel = model('UserModel');

        $user = $userModel->where('username', $username)->first();

        if ($user) {
            return redirect()->to(base_url('register') . '?error=Username sudah terdaftar')->withInput();
        }

        try {
            $userModel->insert([
                'name' => $name,
                'username' => $username,
                'email' => $email,
                'password' => $password,
                'phone' => $phone,
                'address' => $address,
                'role_id' => $role_id,
            ]);

            return redirect()->to(base_url('login') . '?success=Registrasi berhasil, silahkan login');
        } catch (\Exception $e) {
            return redirect()->to(base_url('register') . '?error=' . $e->getMessage())->withInput();
        }
    }

    public function logout()
    {
        // Remove session
        session()->remove('id');
        session()->remove('email');
        session()->remove('name');
        session()->remove('role_id');

        return redirect()->to(base_url('/'));
    }
}
