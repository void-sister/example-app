<?php

namespace App\Http\Repositories;

use App\Models\Product;

class ProductRepository extends BaseRepository
{
    public function getProductBySlug($slug) {
        return Product::where('slug', $slug)->first();
    }

    public function createProduct($params)
    {
        return Product::create([
            'SKU' => $params['SKU'],
            'slug' => $params['slug'],
            'product_name' => $params['product_name'],
            'product_description' => $params['product_description'],
            'care_rules' => $params['care_rules'],
            'height' => $params['height'],
            'price' => $params['price'],
            'discount' => $params['discount'],
            'units_in_stock' => $params['units_in_stock'],
            'units_on_order' => $params['units_on_order'],
//            'product_available' => $params['product_available'],
            'discount_available' => 0,
        ]);
    }

    public function updateProduct($params, $slug) {
        return Product::where('slug', $slug)->update([
            'SKU' => $params['SKU'],
            'slug' => $params['slug'],
            'product_name' => $params['product_name'],
            'product_description' => $params['product_description'],
            'care_rules' => $params['care_rules'],
            'height' => $params['height'],
            'price' => $params['price'],
            'discount' => $params['discount'],
            'units_in_stock' => $params['units_in_stock'],
            'units_on_order' => $params['units_on_order'],
//            'product_available' => $params['product_available'],
//            'discount_available' => $params['discount_available'],
        ]);
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
