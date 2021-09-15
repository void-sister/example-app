<?php

namespace App\Http\Services;

use App\Models\Plant;
use App\Models\PlantSearch;

class PlantService extends BaseService
{
    public function getList() {
        return Plant::orderBy('is_archived')->get(); //TODO order active first
    }

    public function getListForClient($params) {
        $query = Plant::where('is_archived', false);

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

    public function createPlant($params)
    {
        //TODO if no params (nullable)

        return Plant::create([
            'slug' => $params['slug'],
            'name_ru' => $params['name_ru'],
            'name_uk' => $params['name_uk'],
            'botanical_name' => $params['botanical_name'],
            'description_ru' => $params['description_ru'],
            'description_uk' => $params['description_uk'],
            'care_rules_ru' => $params['care_rules_ru'],
            'care_rules_uk' => $params['care_rules_uk'],
            'indoor_light' => $params['indoor_light'],
            'outdoor_light' => $params['outdoor_light'],
            'air_cleaner' => array_key_exists('air_cleaner', $params) ? 1 : 0,
            'pet_friendly' => array_key_exists('pet_friendly', $params) ? 1 : 0,
            'difficulty' => $params['difficulty'],
            'height' => $params['height'],
            'size' => $params['size'],
            'notes' => $params['notes']
        ]);
    }

    public function updatePlant($params, Plant $plant): bool
    {
        $updatedPlant = $plant->update([
            'slug' => $params['slug'],
            'name_ru' => $params['name_ru'],
            'name_uk' => $params['name_uk'],
            'botanical_name' => $params['botanical_name'],
            'description_ru' => $params['description_ru'],
            'description_uk' => $params['description_uk'],
            'care_rules_ru' => $params['care_rules_ru'],
            'care_rules_uk' => $params['care_rules_uk'],
            'indoor_light' => $params['indoor_light'],
            'outdoor_light' => $params['outdoor_light'],
            'air_cleaner' => array_key_exists('air_cleaner', $params) ? 1 : 0,
            'pet_friendly' => array_key_exists('pet_friendly', $params) ? 1 : 0,
            'difficulty' => $params['difficulty'],
            'height' => $params['height'],
            'size' => $params['size'],
            'notes' => $params['notes']
        ]);

        if(!$updatedPlant) {
            //TODO early return
        }

        return $updatedPlant;
    }

    public function archive(Plant $plant): bool
    {
        return $plant->update([
            'is_archived' => true,
        ]);
    }

    public function returnFromArchive(Plant $plant): bool
    {
        return $plant->update([
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
