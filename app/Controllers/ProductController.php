<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class ProductController extends BaseController
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

        $productModel = model('ProductModel');
        $products = $productModel->orderBy('id', 'desc')->findAll();

        // Get Image
        for ($i = 0; $i < count($products); $i++) {
            $productImageModel = model('ProductImageModel');
            $image = $productImageModel->where('product_id', $products[$i]['id'])->first();
            if ($image) {
                $products[$i]['image'] = $image['image'];
            }
        }

        return view('product', [
            'products' => $products,
        ]);
    }

    public function createView()
    {
        // Check session
        if (!session()->get('id')) {
            return redirect()->to(base_url('login'));
        }

        // Check role
        if (session()->get('role_id') > 2) {
            return redirect()->to(base_url('/'));
        }

        return view('product_create');
    }

    public function create()
    {
        // Check session
        if (!session()->get('id')) {
            return redirect()->to(base_url('login'));
        }

        // Check role
        if (session()->get('role_id') > 2) {
            return redirect()->to(base_url('/'));
        }

        $productModel = model('ProductModel');

        $product = [
            'name' => $this->request->getPost('name'),
            'description' => $this->request->getPost('description'),
            'purchase_price' => $this->request->getPost('purchase_price'),
            'selling_price' => $this->request->getPost('selling_price'),
            'initial_stock' => $this->request->getPost('initial_stock'),
            'unit' => $this->request->getPost('unit'),
            'category' => $this->request->getPost('category'),
            'store_id' => 1,
        ];

        try {
            $productModel->insert($product);

            // Handle image
            $image = $this->request->getFile('image');
            if ($image->isValid() && !$image->hasMoved()) {
                $newName = $image->getRandomName();
                $image->move('uploads', $newName);

                $productImageModel = model('ProductImageModel');
                $productImageModel->insert([
                    'image' => $newName,
                    'product_id' => $productModel->getInsertID(),
                    'store_id' => 1,
                ]);
            }

            return redirect()->to(base_url('product') . '?success=Produk berhasil ditambahkan');
        } catch (\Exception $e) {
            return redirect()->to(base_url('product/create') . '?error=Produk gagal ditambahkan' . $e->getMessage())->withInput();
        }
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

        $productModel = model('ProductModel');
        $product = $productModel->find($id);

        $productImageModel = model('ProductImageModel');
        $image = $productImageModel->where('product_id', $product['id'])->first();

        if ($image) {
            $product['image'] = $image;
        }

        return view('product_update', [
            'product' => $product,
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

        $productModel = model('ProductModel');

        $product = [
            'name' => $this->request->getPost('name'),
            'description' => $this->request->getPost('description'),
            'purchase_price' => $this->request->getPost('purchase_price'),
            'selling_price' => $this->request->getPost('selling_price'),
            'initial_stock' => $this->request->getPost('initial_stock'),
            'unit' => $this->request->getPost('unit'),
            'category' => $this->request->getPost('category'),
        ];

        try {
            $productModel->update($id, $product);

            // Handle image
            $image = $this->request->getFile('image');
            if ($image->isValid() && !$image->hasMoved()) {
                $newName = $image->getRandomName();
                $image->move('uploads', $newName);

                $productImageModel = model('ProductImageModel');
                $productImageModel->where('product_id', $id)->delete();

                $productImageModel->insert([
                    'image' => $newName,
                    'product_id' => $id,
                    'store_id' => 1,
                ]);
            }

            return redirect()->to(base_url('product') . '?success=Produk berhasil diubah');
        } catch (\Exception $e) {
            return redirect()->to(base_url('product/update/' . $id) . '?error=Produk gagal diubah' . $e->getMessage())->withInput();
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

        $productModel = model('ProductModel');
        $productModel->delete($id);

        return redirect()->to(base_url('product') . '?success=Produk berhasil dihapus');
    }
}
