<?php

namespace App\Http\Services;

use App\Http\Repositories\ProductRepository;

class ProductService extends BaseService
{
    public function getList($params) {
        $repository = new ProductRepository();
        return $repository->getList($params);
    }

    public function getProductBySlug($slug) {
        $repository = new ProductRepository();
        return $repository->getProductBySlug($slug);
    }

    public function createProduct($params)
    {
        $repository = new ProductRepository();
        return $repository->createProduct($params);
    }

    public function updateProduct($params, $slug) {
        $repository = new ProductRepository();
        return $repository->updateProduct($params, $slug);
    }

    public function archive($slug) {
        $repository = new ProductRepository();
        return $repository->archive($slug);
    }

    public function returnFromArchive($slug) {
        $repository = new ProductRepository();
        return $repository->returnFromArchive($slug);
    }
}
