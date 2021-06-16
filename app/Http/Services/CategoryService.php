<?php

namespace App\Http\Services;

use App\Http\Repositories\CategoryRepository;

class CategoryService extends BaseService
{
    public function getList() {
        $repository = new CategoryRepository();
        return $repository->getList();
    }

    public function getCategoryBySlug($slug) {
        $repository = new CategoryRepository();
        return $repository->getCategoryBySlug($slug);
    }

    public function updateCategory($params, $slug) {
        $repository = new CategoryRepository();
        return $repository->updateCategory($params, $slug);
    }

    public function createCategory($params)
    {
        $repository = new CategoryRepository();
        return $repository->createCategory($params);
    }

    public function archive($slug) {
        $repository = new CategoryRepository();
        return $repository->archive($slug);
    }

    public function returnFromArchive($slug) {
        $repository = new CategoryRepository();
        return $repository->returnFromArchive($slug);
    }
}
