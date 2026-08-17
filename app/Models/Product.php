<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Pishran\LaravelPersianSlug\HasPersianSlug;
use Spatie\Sluggable\SlugOptions;

class Product extends Model
{
    protected $table = 'products';

    protected $fillable = [
        'name',
        'description',
        'status',
        'category_id',
        'brand_id',
        'images',
        'features',
        'title'
    ];


    protected $casts = [
        'features' => 'array',
        'images' => 'array'
    ];

    use HasPersianSlug;

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function review()
    {
        return $this->hasMany(Review::class)->where('approved', 1);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function variants()
    {
        return $this->hasMany(ProductVariant::class);
    }


    public function cheapestVariant()
    {
        return $this->variants()->where('is_active', true)->orderBy('price', 'asc');
    }

    public function getActiveVariantAttribute()
    {
        return $this->variants->where('is_active', true)->sortBy('price')->first();
    }
    public function getMinPriceAttribute()
    {
        return $this->variants()->where('is_active', true)->min('price');
    }


    /**
     * Local Scope برای دریافت پرفروش‌ترین محصولات بر اساس تعداد فروخته شده
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param int $limit تعداد محصولاتی که می‌خواهید خروجی بگیرید
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeBestSellers($query, $limit = 10)
    {
        return $query->withCount(['items as total_sold' => function ($subQuery) {
            $subQuery->select(\DB::raw('SUM(quantity)'))
                ->whereHas('order', function ($orderQuery) {
                    // ⚠️ حتماً وضعیت‌های معتبر سفارش در بیزینس خودتان را اینجا جایگزین کنید
                    $orderQuery->whereIn('status', ['paid', 'completed', 'delivered']);
                });
        }])
            ->orderByDesc('total_sold')
            ->take($limit);
    }


    /**
     * ارتباط محصول با آیتم‌های سفارش جهت محاسبه پرفروش‌ترین‌ها
     */
    public function items()
    {
        return $this->hasMany(OrderItem::class, 'product_id');
    }
}
