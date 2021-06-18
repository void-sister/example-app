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
        'height',
        'price',
        'discount',
        'units_in_stock',
        'units_on_order',
//        'product_available',
//        'description_available',
    ];
}
