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
            'indoor_light' => $params['indoor_light'],
            'outdoor_light' => $params['outdoor_light'],
            'air_cleaner' => isset($params['air_cleaner']) ? 1 : 0,
            'pet_friendly' => isset($params['pet_friendly']) ? 1 : 0,
            'difficulty' => $params['difficulty'],
            'height' => $params['height'],
            'size' => $params['size'],
            'price' => $params['price'],
            'discount' => $params['discount'],
            'units_in_stock' => $params['units_in_stock'],
            'units_on_order' => $params['units_on_order'],
            'product_available' => isset($params['product_available']) ? 1 : 0,
            'discount_available' => isset($params['discount_available']) ? 1 : 0,
        ]);
    }

    public function updateProduct($params, $slug) {
        return Product::where('slug', $slug)->update([
            'SKU' => $params['SKU'],
            'slug' => $params['slug'],
            'product_name' => $params['product_name'],
            'product_description' => $params['product_description'],
            'care_rules' => $params['care_rules'],
            'indoor_light' => $params['indoor_light'],
            'outdoor_light' => $params['outdoor_light'],
            'air_cleaner' => $params['air_cleaner'] ? 1 : 0,
            'pet_friendly' => $params['pet_friendly'] ? 1 : 0,
            'difficulty' => $params['difficulty'],
            'height' => $params['height'],
            'size' => $params['size'],
            'price' => $params['price'],
            'discount' => $params['discount'],
            'units_in_stock' => $params['units_in_stock'],
            'units_on_order' => $params['units_on_order'],
            'product_available' => $params['product_available'] ? 1 : 0,
            'discount_available' => $params['discount_available'] ? 1 : 0,
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
