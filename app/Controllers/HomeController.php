<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class HomeController extends BaseController
{
    public function index()
    {
        $productModel = model('ProductModel');
        $products = $productModel->findAll();

        // Get Image
        for ($i = 0; $i < count($products); $i++) {
            $productImageModel = model('ProductImageModel');
            $image = $productImageModel->where('product_id', $products[$i]['id'])->first();
            if ($image) {
                $products[$i]['image'] = $image['image'];
            }
        }

        return view('home', [
            'products' => $products,
        ]);
    }
}
