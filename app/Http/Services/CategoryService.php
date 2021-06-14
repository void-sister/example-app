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
}
