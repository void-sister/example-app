<?php

namespace App\Models;

use App\Http\Services\ProductService;
use Illuminate\Database\Eloquent\Model;

class ProductSearch extends Model
{
    public $skip;
    public $amount = 10;
    public $page = 1;
    public $indoor_light = [];
    public $size = [];
    public $difficulty = [];
    public $pet_friendly;
    public $air_cleaner;
    public $price = [];
    public $sorting = 'pop'; //popularity
    public $searchtext; //TODO

    const SORTING_TYPE_POPULARITY = 'pop';
    const SORTING_TYPE_AVERAGE_RATING = 'av';
    const SORTING_TYPE_NEWEST = 'new';
    const SORTING_TYPE_PRICE_ASC = 'price_l';
    const SORTING_TYPE_PRICE_DESC = 'price_h';

    public function search(array $params = [])
    {
        $queryParams = $params;

        $queryParams['amount'] = $this->amount;
        $queryParams['sorting'] = $params['sorting'] ?? $this->sorting;

        $service = new ProductService();
        return $service->getList($queryParams);
    }

    public function getSortingTypes(): array
    {
        return [
            self::SORTING_TYPE_POPULARITY => 'popularity',
            self::SORTING_TYPE_AVERAGE_RATING => 'average rating',
            self::SORTING_TYPE_NEWEST => 'newest',
            self::SORTING_TYPE_PRICE_ASC => 'price: low to high',
            self::SORTING_TYPE_PRICE_DESC => 'price: high to low'
        ];
    }
}
