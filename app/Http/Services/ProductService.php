<?php

namespace App\Http\Services;

use App\Http\Repositories\ProductRepository;

class ProductService extends BaseService
{
    public function getProductBySlug($slug) {
        $repository = new ProductRepository();
        return $repository->getProductBySlug($slug);
    }

    public function createProduct($params)
    {
        $repository = new ProductRepository();
        return $repository->createProduct($params);
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
