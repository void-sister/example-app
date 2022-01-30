<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pot extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_category_id',
        'slug',
        'height',
        'diameter',
        'material',
    ];
}
