<?php

namespace App\Http\Repositories;

use App\Models\Category;

class CategoryRepository extends BaseRepository
{
    public function getList() {
        return Category::all();
    }
}
