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
        'product_available',
        'discount_available',
    ];

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

    public function getIndoorLightType($indoor_light): string
    {
        return self::getIndoorLightTypes()[$indoor_light];
    }

    /** outdoor light types */
    public static function getOutdoorLightTypes(): array
    {
        return [
            self::OUTDOOR_LIGHT_SUN => 'Sun',
            self::OUTDOOR_LIGHT_SHADE => 'Shade',
        ];
    }

    public function getOutdoorLightType($outdoor_light): string
    {
        return self::getOutdoorLightTypes()[$outdoor_light];
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

    public function getDifficultyType($difficulty): string
    {
        return self::getDifficultyTypes()[$difficulty];
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

    public function getSize($size): string
    {
        return self::getSizes()[$size];
    }

    /** check air cleaner */
    public function isAirCleaner($air_cleaner): bool
    {
        return $air_cleaner == true;
    }

    /** check pet friendly */
    public function isPetFriendly($pet_friendly): bool
    {
        return $pet_friendly == true;
    }

    /** check product available */
    public function isProductAvailable($product_available): bool
    {
        return $product_available == true;
    }

    /** check discount available */
    public function isDiscountAvailable($discount_available): bool
    {
        return $discount_available == true;
    }


    /** Scopes */
    public function scopeOfIndoorLightType($query, $type)
    {
        return $query->whereIn('indoor_light', $type); //TODO type is string, must be array. why?
    }

    public function scopeOfSize($query, $size)
    {
        return $query->whereIn('size', $size);//TODO size is string, must be array. why?
    }

    public function scopeOfDifficultyType($query, $type)
    {
        return $query->whereIn('difficulty', $type);//TODO type is string, must be array. why?
    }
    /** Scopes */
}
