<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $table = 'addresses';

    protected $fillable = [
        'user_id',
        'name',
        'family_name',
        'telephone',
        'province',
        'city',
        'full_address',
        'postal_code',
        'description',

    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function provinceRelation()
    {
        return $this->belongsTo(ProvinceCities::class, 'province', 'id');
    }

    public function cityRelation()
    {
        return $this->belongsTo(ProvinceCities::class, 'city', 'id');
    }

}
