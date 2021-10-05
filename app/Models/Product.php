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

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function productImages(){
        return $this->hasMany(ProductImage::class);
    }

    public function wights()
    {
        return $this->belongsToMany(Weight::class);
    }

    public function prices()
    {
        return $this->belongsToMany(Price::class);
    }
  
}
