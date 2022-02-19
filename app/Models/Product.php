<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\{
    BelongsToMany,
    HasMany,
    HasOne
};

class Product extends Model
{
    use HasFactory;

    const SUPPLIER_PRODUCT_TABLE = 'supplier_products';
    const PRODUCT_ID_FOREIGN_KEY = 'product_id';

    protected $fillable = [
        'product_category_id',
        'entity_id',
    ];

    /**
     * The suppliers that belong to the product.
     */
    public function suppliers(): BelongsToMany
    {
        return $this->belongsToMany(Supplier::class, self::SUPPLIER_PRODUCT_TABLE);
    }

    /**
     * Get the translations for the product.
     */
    public function translations(): HasMany
    {
        return $this->hasMany(ProductI18N::class, self::PRODUCT_ID_FOREIGN_KEY);
    }

    /**
     * Get the category associated with the product.
     */
    public function category(): HasOne
    {
        return $this->hasOne(ProductCategory::class, 'category_id', 'product_category_id'); //todo constants
    }
}
