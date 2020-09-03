<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'title', 'sku', 'description'
    ];

    public function product_variants()
    {
        return $this->hasMany(ProductVariant::class);
    }

    public function variants_price()
    {
        return $this->hasManyThrough(Product::class,ProductVariantPrice::class, 'product_id', 'id', 'product_id','product_id');
    }


}
