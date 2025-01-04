<?php

namespace App\Controllers\API;

use App\Controllers\BaseController;
use App\Helpers\ResponseFormatter;
use CodeIgniter\HTTP\ResponseInterface;

class AuthController extends BaseController
{
    public function login()
    {
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $userModel = model('UserModel');

        $user = $userModel->where('email', $email)->first();

        if (!$user) {
            return ResponseFormatter::error('Login gagal', 401);
        }

        if (!password_verify($password, $user['password'])) {
            return ResponseFormatter::error('Login gagal', 401);
        }

        return ResponseFormatter::success([
            'token' => 'token',
            'token_type' => 'bearer',
            'user' => $user,
        ], 'Login berhasil');
    }
}
