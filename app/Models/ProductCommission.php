<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCommission extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'product_id',
        'tier_1_id',
        'tier_2_id',
        'tier_3_id',
        'tier_1_price',
        'tier_2_price',
        'tier_3_price',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    protected $casts = [
        'created_at' => 'date:d M, Y H:i',
    ];
}
