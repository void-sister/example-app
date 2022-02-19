<?php

namespace App\Models;

use Illuminate\Database\Eloquent\{
    Factories\HasFactory,
    Model,
    Relations\HasMany
};

class ProductCategory extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'product_categories';

    /**
     * Get the translations for the product category.
     */
    public function translations(): HasMany
    {
        return $this->hasMany(ProductCategoryI18N::class, 'product_category_id'); //todo const
    }
}
