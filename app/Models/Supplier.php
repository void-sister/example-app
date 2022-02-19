<?php

namespace App\Models;

use Illuminate\Database\Eloquent\{
    Factories\HasFactory,
    Model,
    Relations\BelongsToMany
};

class Supplier extends Model
{
    use HasFactory;

    const SUPPLIER_PRODUCT_TABLE = 'supplier_products';

    protected $fillable = [
        'name',
        'region_id',
    ];

    /**
     * The products that belong to the supplier.
     */
    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class, self::SUPPLIER_PRODUCT_TABLE);
    }
}
