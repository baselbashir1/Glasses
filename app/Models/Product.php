<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class Product extends Model
{
    use HasFactory, Translatable;

    protected $fillable = ['product_type', 'image', 'price'];
    public $translatedAttributes = ['brand', 'color'];

    public function productType(): HasOne
    {
        return $this->hasOne(ProductType::class, 'id', 'product_type');
    }
}
