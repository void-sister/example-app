<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'SKU',
        'slug',
        'product_name',
        'product_description',
        'care_rules',
        'indoor_light',
        'outdoor_light',
        'air_cleaner',
        'pet_friendly',
        'difficulty',
        'height',
        'size',
        'price',
        'discount',
        'units_in_stock',
        'units_on_order',
//        'product_available',
//        'description_available',
    ];

    private $SKU;
    private $slug;
    private $product_name;
    private $product_description;
    private $care_rules;
    private $indoor_light;
    private $outdoor_light;
    private $air_cleaner;
    private $pet_friendly;
    private $difficulty;
    private $height;
    private $size;
    private $price;
    private $discount;
    private $units_in_stock;
    private $units_on_order;

    const INDOOR_LIGHT_LOW = 1;
    const INDOOR_LIGHT_PARTIAL = 2;
    const INDOOR_LIGHT_DIRECT = 3;

    const OUTDOOR_LIGHT_SUN = 1;
    const OUTDOOR_LIGHT_SHADE = 2;

    const DIFFICULTY_NO_FUSS = 1;
    const DIFFICULTY_EASY = 2;
    const DIFFICULTY_MODERATE = 3;

    const SIZE_EXTRA_SMALL = 1;
    const SIZE_SMALL = 2;
    const SIZE_MEDIUM = 3;
    const SIZE_LARGE = 4;
    const SIZE_EXTRA_LARGE = 5;

    /** indoor light types */
    public static function getIndoorLightTypes(): array
    {
        return [
            self::INDOOR_LIGHT_LOW => 'Low/Artificial', //TODO translate
            self::INDOOR_LIGHT_PARTIAL => 'Partial/Bright Indirect',
            self::INDOOR_LIGHT_DIRECT => 'Direct Sunlight',
        ];
    }

    public function getIndoorLightType(): string
    {
        return self::getIndoorLightTypes()[$this->indoor_light];
    }

    /** outdoor light types */
    public static function getOutdoorLightTypes(): array
    {
        return [
            self::OUTDOOR_LIGHT_SUN => 'Sun',
            self::OUTDOOR_LIGHT_SHADE => 'Shade',
        ];
    }

    public function getOutdoorLightType(): string
    {
        return self::getOutdoorLightTypes()[$this->outdoor_light];
    }

    /** difficulty types */
    public static function getDifficultyTypes(): array
    {
        return [
            self::DIFFICULTY_NO_FUSS => 'No-Fuss',
            self::DIFFICULTY_EASY => 'Easy',
            self::DIFFICULTY_MODERATE => 'Moderate',
        ];
    }

    public function getDifficultyType(): string
    {
        return self::getDifficultyTypes()[$this->difficulty];
    }

    /** sizes */
    public static function getSizes(): array
    {
        return [
            self::SIZE_EXTRA_SMALL => 'Extra Small',
            self::SIZE_SMALL => 'Small',
            self::SIZE_MEDIUM => 'Medium',
            self::SIZE_LARGE => 'Large',
            self::SIZE_EXTRA_LARGE => 'Extra Large',
        ];
    }

    public function getSize(): string
    {
        return self::getSizes()[$this->size];
    }

    /** check air cleaner */
    public function isAirCleaner(): bool
    {
        return $this->air_cleaner == true;
    }

    /** check pet friendly */
    public function isPetFriendly(): bool
    {
        return $this->pet_friendly == true;
    }
}
