<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'sku',
        'name',
        'abbreviation',
        'product_picture',
        'pricing_type',
        'fixed_amount',
        'promo_amount',
        'buy_bank_amount',
        'surcharge_at_product',
        'description',
        'catergory_id',
        'mark_up',
    ];
    protected $dates = [

        'created_at',
        'updated_at',
    ];

    protected $casts = [
        'created_at' => 'date:d M, Y H:i',
    ];

    public function category()
    {
        return $this->belongsTo(Catergory::class, 'catergory_id', 'id');
    }

    public function customer_products()
    {
        return $this->hasMany(CustomerProduct::class);
    }
}
