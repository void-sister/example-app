<?php

namespace App\Http\Repositories;

use App\Models\Product;
use App\Models\ProductSearch;

class ProductRepository extends BaseRepository
{
    public function getList($params) {
        $query = Product::where('is_archived', false)->where('product_available', true);

        if (isset($params['indoor_light'])) {
            $query = $query->ofIndoorLightType($params['indoor_light']);
        }

        if (isset($params['size'])) {
            $query = $query->ofSize($params['size']);
        }

        if (isset($params['difficulty'])) {
            $query = $query->ofDifficultyType($params['difficulty']);
        }

        if (isset($params['pet_friendly'])) {
            $query = $query->where('pet_friendly', (int)$params['pet_friendly']);
        }

        if (isset($params['air_cleaner'])) {
            $query = $query->where('air_cleaner', (int)$params['air_cleaner']);
        }

        //TODO: add price between

        if (isset($params['sorting'])) {
            switch ($params['sorting']) {
                case ProductSearch::SORTING_TYPE_NEWEST:
                    $query = $query->orderByDesc('products.created_at');
                    break;
                case ProductSearch::SORTING_TYPE_PRICE_ASC:
                    $query = $query->orderBy('products.price');
                    break;
                case ProductSearch::SORTING_TYPE_PRICE_DESC:
                    $query = $query->orderByDesc('products.price');
                    break;
                case ProductSearch::SORTING_TYPE_POPULARITY:
                default:
                    $query = $query->orderByDesc('products.ranking');
                    break;
            }
        } else {
            $query = $query->orderByDesc('products.ranking');
        }

        if (isset($params['amount'])) {
            return $query->paginate((int)$params['amount']);
        } else {
            return $query->get();
        }
    }

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
