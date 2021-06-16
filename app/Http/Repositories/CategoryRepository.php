<?php

namespace App\Http\Repositories;

use App\Models\Category;

class CategoryRepository extends BaseRepository
{
    public function getList() {
        return Category::all();
    }

    public function getCategoryBySlug($slug) {
        return Category::where('slug', $slug)->first();
    }

    public function updateCategory($params, $slug) {
        return Category::where('slug', $slug)->update([
            'slug' => $params['slug'],
            'name_ru' => $params['name_ru'],
            'name_uk' => $params['name_uk'],
        ]);
    }

    public function createCategory($params)
    {
        return Category::create([
            'slug' => $params['slug'],
            'name_ru' => $params['name_ru'],
            'name_uk' => $params['name_uk'],
        ]);
    }

    public function archive($slug) {
        return Category::where('slug', $slug)->update([
            'is_archived' => true,
        ]);
    }

    public function returnFromArchive($slug) {
        return Category::where('slug', $slug)->update([
            'is_archived' => false,
        ]);
    }
}
