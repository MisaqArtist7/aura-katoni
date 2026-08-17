<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $table = 'payments';
    protected $fillable = [
        'order_id',
        'amount',
        'ref_code',
        'status',
        'paid_at',
        'authority'

    ];

    
    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
