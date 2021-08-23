<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'brand_id',
        'weight',
        'price',
        'discount',
        'category_id',
        'description',
    ];

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function productImage(){
        return $this->hasMany(ProductImage::class);
    }
}
