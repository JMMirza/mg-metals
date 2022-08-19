<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'customer_id',
        'total_order_price',
        'total_quantity',
        'delivery_method',
        'delivery_method_id',
        'payment_method',
        'payment_method_id',
        'order_status',
        'delivery_status',
        'payment_status',
        'courier_type',
        'currency',
        'full_name',
        'phone_number',
        'email',
        'city',
        'country',
        'zip_code',
        'shipping_address',
    ];

    protected $dates = [

        'created_at',
        'updated_at',
    ];

    protected $casts = [
        'created_at' => 'date:d M, Y H:i',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id', 'id');
    }

    public function product_commissions()
    {
        return $this->hasMany(ProductCommission::class);
    }

    public function order_products()
    {
        return $this->hasMany(OrderProduct::class);
    }

    public function delivery_method()
    {
        return $this->belongsTo(Setup::class, 'delivery_method_id', 'id');
    }

    public function payment_method()
    {
        return $this->belongsTo(PaymentMethod::class, 'payment_method_id', 'id');
    }
}
