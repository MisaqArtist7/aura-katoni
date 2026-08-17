<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductVariant extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'sku',
        'size',
        'color',
        'price',
        'discount_price',
        'stock',
        'is_active',

    ];


    public function product()
    {
        return $this->belongsTo(Product::class);
    }


    public function getFormattedPriceAttribute()
    {
        return number_format($this->price) . ' تومان';
    }
    public function colorRelation()
    {
        return $this->belongsTo(Color::class, 'color', 'code');
    }

}
