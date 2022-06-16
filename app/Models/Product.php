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
        'manufacturer_id',
        'weight',
        'mark_up',
    ];
    protected $dates = [

        'created_at',
        'updated_at',
    ];

    protected $casts = [
        'created_at' => 'date:d M, Y H:i',
    ];

    protected $appends = [
        'product_picture_url',
    ];

    public function category()
    {
        return $this->belongsTo(Catergory::class, 'catergory_id', 'id');
    }

    public function customer_products()
    {
        return $this->hasMany(CustomerProduct::class);
    }

    public function getProductPictureUrlAttribute()
    {
        $image = asset('frontend/images/shop/shop-prev-1.jpg');

        if (!empty($this->product_picture) && file_exists('uploads/products/' . $this->product_picture)) {
            $image = asset('uploads/products/' . $this->product_picture);
        }

        return $image;
    }
}
