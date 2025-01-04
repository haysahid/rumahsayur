<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class DashboardController extends BaseController
{
    public function index()
    {
        $userModel = model('UserModel');
        $storeModel = model('StoreModel');
        $productModel = model('ProductModel');

        $data = [
            'total_user' => $userModel->countAllResults(),
            'total_store' => $storeModel->countAllResults(),
            'total_product' => $productModel->countAllResults(),
        ];

        return view('dashboard', $data);
    }
}
