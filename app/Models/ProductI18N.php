<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductI18N extends Model
{
    use HasFactory;

    protected $table = 'product_i18n';

    protected $fillable = [
        'product_id',
        'language',
        'name',
        'description',
        'care_rules',
    ];

    /**
     * Get the product that owns the translations.
     */
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
