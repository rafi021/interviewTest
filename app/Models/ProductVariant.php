<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductVariant extends Model
{
    public function prodcut()
    {
        return $this->belongsTo(Product::class);
    }
}
