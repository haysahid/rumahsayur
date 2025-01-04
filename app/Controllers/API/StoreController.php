<?php

namespace App\Controllers\API;

use App\Helpers\ResponseFormatter;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;

class StoreController extends ResourceController
{
    /**
     * Return an array of resource objects, themselves in array format.
     *
     * @return ResponseInterface
     */
    public function index()
    {
        $limit = $this->request->getGet('limit') ?? 10;
        $page = $this->request->getGet('page') ?? 1;

        $storeModel = model('StoreModel');

        $stores = $storeModel->paginate($limit, page: $page);
        $response = $storeModel->pager->getDetails();
        $response['data'] = $stores;

        return ResponseFormatter::success($response, 'Data toko berhasil ditemukan');
    }

    /**
     * Return the properties of a resource object.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function show($id = null)
    {
        $storeModel = model('StoreModel');
        $store = $storeModel->find($id);

        if (!$store) {
            return ResponseFormatter::error('Toko tidak ditemukan', 404);
        }

        return ResponseFormatter::success($store, 'Data toko berhasil ditemukan');
    }

    /**
     * Return a new resource object, with default properties.
     *
     * @return ResponseInterface
     */
    public function new()
    {
        //
    }

    /**
     * Create a new resource object, from "posted" parameters.
     *
     * @return ResponseInterface
     */
    public function create()
    {
        $storeModel = model('StoreModel');
        $store = $this->request->getJSON();

        try {
            $storeModel->insert($store);
            $store->id = $storeModel->getInsertID();

            return ResponseFormatter::success($store, 'Data toko berhasil disimpan');
        } catch (\Exception $e) {
            return ResponseFormatter::error($e->getMessage());
        }
    }

    /**
     * Return the editable properties of a resource object.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function edit($id = null)
    {
        //
    }

    /**
     * Add or update a model resource, from "posted" properties.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function update($id = null)
    {
        $storeModel = model('StoreModel');
        $store = $storeModel->find($id);

        if (!$store) {
            return ResponseFormatter::error('Toko tidak ditemukan', 404);
        }

        $data = $this->request->getJSON();
        $storeModel->update($id, $data);

        return ResponseFormatter::success($data, 'Data toko berhasil diperbarui');
    }

    /**
     * Delete the designated resource object from the model.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function delete($id = null)
    {
        $storeModel = model('StoreModel');
        $store = $storeModel->find($id);

        if (!$store) {
            return ResponseFormatter::error('Toko tidak ditemukan', 404);
        }

        $storeModel->delete($id);

        return ResponseFormatter::success(null, 'Data toko berhasil dihapus');
    }
}
