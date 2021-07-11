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
            'air_cleaner' => array_key_exists('air_cleaner', $params) ? 1 : 0,
            'pet_friendly' => array_key_exists('pet_friendly', $params) ? 1 : 0,
            'difficulty' => $params['difficulty'],
            'height' => $params['height'],
            'size' => $params['size'],
            'price' => $params['price'],
            'discount' => $params['discount'],
            'units_in_stock' => $params['units_in_stock'],
            'units_on_order' => $params['units_on_order'],
            'product_available' => array_key_exists('product_available', $params) ? 1 : 0,
            'discount_available' => array_key_exists('discount_available', $params) ? 1 : 0,
            'notes' => $params['notes']
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
            'air_cleaner' => array_key_exists('air_cleaner', $params) ? 1 : 0,
            'pet_friendly' => array_key_exists('pet_friendly', $params) ? 1 : 0,
            'difficulty' => $params['difficulty'],
            'height' => $params['height'],
            'size' => $params['size'],
            'price' => $params['price'],
            'discount' => $params['discount'],
            'units_in_stock' => $params['units_in_stock'],
            'units_on_order' => $params['units_on_order'],
            'product_available' => array_key_exists('product_available', $params) ? 1 : 0,
            'discount_available' => array_key_exists('discount_available', $params) ? 1 : 0,
            'notes' => $params['notes']
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
