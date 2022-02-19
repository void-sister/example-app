<?php

namespace App\Http\Services;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class ProductService extends BaseService
{
    public function getPlantsList(string $lang): Collection
    {
        $plantCategories = DB::table('product_categories')
            ->where('parent_id', '=', 1)
            ->pluck('category_id')->toArray();

        return DB::table('products')
            ->leftJoin('product_i18n', function($leftJoin) use ($lang) {
                $leftJoin->on('product_i18n.product_id', '=', 'products.id')
                         ->where('language', $lang);
            })
            ->join('product_categories', 'products.product_category_id', '=', 'product_categories.category_id')
            ->join('product_category_i18n', 'product_category_i18n.product_category_id', '=', 'product_categories.category_id')
            ->join('plants', 'products.entity_id', '=', 'plants.id')
            ->leftJoin('supplier_products', 'products.id', '=', 'supplier_products.product_id')
            ->leftJoin('suppliers', 'supplier_products.supplier_id', '=', 'suppliers.id')
            ->select(
                'product_i18n.name as plant_name',
                'product_category_i18n.name as category_name',
                'plants.id as plant_id',
                'plants.indoor_light as indoor_light',
                'plants.is_archived as is_archived',
                'suppliers.name as suppliers',
                'suppliers.id as supplier_id'
            )
            ->where(function($query) use ($plantCategories, $lang) {
                $query->whereIn('products.product_category_id', $plantCategories);
                $query->where([
                    ['product_category_i18n.language', '=', $lang]
                ]);
            })
            ->get();
    }
}
