<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PageView extends Model
{
    protected $table = 'page_views';

    protected $fillable = ['post_id', 'ip_address', 'page_type'];
}
