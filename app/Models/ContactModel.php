<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactModel extends Model
{
    protected $table = 'contact_us';

    protected $fillable = [
        'name',
        'number',
        'message'
    ];
}
