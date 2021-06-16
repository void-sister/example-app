<?php

namespace App\Http\Repositories;

use App\Models\Product;

class ProductRepository extends BaseRepository
{
    public function getProductBySlug($slug) {
        return Product::where('slug', $slug)->first();
    }

    public function archive($slug) {
        return Product::where('slug', $slug)->update([
            'is_archived' => true,
        ]);
    }

    public function returnFromArchive($slug) {
        return Product::where('slug', $slug)->update([
            'is_archived' => false,
        ]);
    }
}
