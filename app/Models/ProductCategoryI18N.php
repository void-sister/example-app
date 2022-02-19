<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductCategoryI18N extends Model
{
    use HasFactory;

    protected $table = 'product_category_i18n';

    protected $fillable = [
        'product_category_id',
        'language',
        'name',
        'description',
    ];

    /**
     * Get the product category that owns the translations.
     */
    public function productCategory(): BelongsTo
    {
        return $this->belongsTo(ProductCategory::class, 'category_id'); //todo const
    }
}
