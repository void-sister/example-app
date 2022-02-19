<?php

namespace App\Http\Services;

use App\Models\ProductI18N;
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
                'products.id as product_id',
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

    public function getProductTranslations(int $productId): Collection
    {
        return ProductI18N::where('product_id', $productId)->get();
    }

    public function updateTranslations(array $data, int $product): bool
    {
        $ruUpdated = DB::table('product_i18n')
            ->where([
                ['product_id', '=', $product],
                ['language', '=', 'ru']
            ])
            ->update([
                'name' => $data['name_ru'],
                'description' => $data['description_ru'],
                'care_rules' => $data['care_rules_ru']
            ]);

        $ukUpdated = DB::table('product_i18n')
            ->where([
                ['product_id', '=', $product],
                ['language', '=', 'uk']
            ])
            ->update([
                'name' => $data['name_uk'],
                'description' => $data['description_uk'],
                'care_rules' => $data['care_rules_uk']
            ]);

        return $ruUpdated > 0 && $ukUpdated > 0;
    }
}
