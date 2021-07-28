<?php

namespace App\Http\Repositories;

use App\Models\Plant;
use App\Models\PlantSearch;

class PlantRepository extends BaseRepository
{
    public function getListForAdmin() {
        return Plant::all();
    }

    public function getListForClient($params) {
        $query = Plant::where('is_archived', false)->where('plant_available', true);

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
                case PlantSearch::SORTING_TYPE_NEWEST:
                    $query = $query->orderByDesc('plants.created_at');
                    break;
                case PlantSearch::SORTING_TYPE_PRICE_ASC:
                    $query = $query->orderBy('plants.price');
                    break;
                case PlantSearch::SORTING_TYPE_PRICE_DESC:
                    $query = $query->orderByDesc('plants.price');
                    break;
                case PlantSearch::SORTING_TYPE_POPULARITY:
                default:
                    $query = $query->orderByDesc('plants.ranking');
                    break;
            }
        } else {
            $query = $query->orderByDesc('plants.ranking');
        }

        if (isset($params['amount'])) {
            return $query->paginate((int)$params['amount']);
        } else {
            return $query->get();
        }
    }

    public function getPlantBySlug($slug) {
        return Plant::where('slug', $slug)->first();
    }

    public function createPlant($params)
    {
        return Plant::create([
            'SKU' => $params['SKU'],
            'slug' => $params['slug'],
            'plant_name' => $params['plant_name'],
            'plant_description' => $params['plant_description'],
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
            'plant_available' => array_key_exists('plant_available', $params) ? 1 : 0,
            'discount_available' => array_key_exists('discount_available', $params) ? 1 : 0,
            'notes' => $params['notes']
        ]);
    }

    public function updatePlant($params, $slug) {
        return Plant::where('slug', $slug)->update([
            'SKU' => $params['SKU'],
            'slug' => $params['slug'],
            'plant_name' => $params['plant_name'],
            'plant_description' => $params['plant_description'],
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
            'plant_available' => array_key_exists('plant_available', $params) ? 1 : 0,
            'discount_available' => array_key_exists('discount_available', $params) ? 1 : 0,
            'notes' => $params['notes']
        ]);
    }

    public function archive($slug) {
        return Plant::where('slug', $slug)->update([
            'is_archived' => true,
        ]);
    }

    public function returnFromArchive($slug) {
        return Plant::where('slug', $slug)->update([
            'is_archived' => false,
        ]);
    }

    public function addToCart($slug, $qty): bool
    {
        $plant = Plant::where('slug', $slug)->firstOrFail();

        $cart = session()->get('cart', []);

        if(isset($cart[$slug])) {
            $cart[$slug]['quantity']++;
        } else {
            $cart[$slug] = [
                "name" => $plant->plant_name,
                "quantity" => $qty,
                "price" => $plant->price,
            ];
        }

        session()->put('cart', $cart);

        return true; //TODO check from is returned. maybe $cart?
    }
}
