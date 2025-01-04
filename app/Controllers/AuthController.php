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
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $userModel = model('UserModel');

        $user = $userModel->where('email', $email)->first();

        if (!$user) {
            return redirect()->to(base_url('login') . '?error=Email tidak ditemukan')->withInput();
        }

        if (!password_verify($password, $user['password'])) {
            return redirect()->to(base_url('login')  . '?error=Email tidak ditemukan')->withInput();
        }

        // Set session
        session()->set([
            'id' => $user['id'],
            'email' => $user['email'],
            'name' => $user['name'],
            'role_id' => $user['role_id'],
        ]);

        return redirect()->to(base_url('dashboard'));
    }

    public function registerView()
    {
        return view('register');
    }

    public function register()
    {
        $name = $this->request->getPost('name');
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $userModel = model('UserModel');

        $user = $userModel->where('email', $email)->first();

        if ($user) {
            return redirect()->to(base_url('register') . '?error=Email sudah terdaftar')->withInput();
        }

        $userModel->save([
            'name' => $name,
            'email' => $email,
            'password' => password_hash($password, PASSWORD_DEFAULT),
        ]);

        return view('login', [
            'success' => 'Registrasi berhasil',
        ]);
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
