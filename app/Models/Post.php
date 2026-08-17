<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Pishran\LaravelPersianSlug\HasPersianSlug;
use Spatie\Sluggable\SlugOptions;

class Post extends Model
{
    use HasPersianSlug;

    protected $table = 'posts';

    protected $fillable = [
        'id',
        'title',
        'slug',
        'body',
        'image',
        'category',
        'tags',
        'description'
    ];


    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }

    public function views(){
        return $this->hasMany(PageView::class);
    }

    public function viewCount()
    {
        return $this->views();
    }

    public function comment()
    {
        return $this->hasMany(Comment::class);
    }


}
