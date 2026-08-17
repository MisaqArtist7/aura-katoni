<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProvinceCities extends Model
{
    protected $table = 'province_cities';

    protected $fillable =[
        'parent',
        'title',
        'id'
    ];
}
