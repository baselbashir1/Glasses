<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['product_type', 'image', 'price', 'is_received'];

    public function productType(): HasOne
    {
        return $this->hasOne(ProductType::class, 'id', 'product_type');
    }
}
