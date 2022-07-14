<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'sku',
        'name',
        'name_s_ch',
        'name_t_ch',
        'abbreviation',
        'product_picture',
        'pricing_type',
        'fixed_amount',
        'promo_amount',
        'buy_bank_amount',
        'surcharge_at_product',
        'description',
        'description_s_ch',
        'description_t_ch',
        'catergory_id',
        'manufacturer_id',
        'weight',
        'mark_up',
        'valid_till',
        'status',
        'markup_type',
        'on_hold',
        'tier_commission_1',
        'tier_commission_2',
        'tier_commission_3'
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

    public function manufacturer()
    {
        return $this->belongsTo(Manufacturer::class, 'manufacturer_id', 'id');
    }

    public function customer_products()
    {
        return $this->hasMany(CustomerProduct::class);
    }

    public function inventories()
    {
        return $this->hasMany(Inventory::class);
    }

    public function getProductPictureUrlAttribute()
    {
        $image = asset('frontend/images/shop/product-placeholder.jpg');

        if (!empty($this->product_picture) && file_exists('uploads/products/' . $this->product_picture)) {
            $image = asset('uploads/products/' . $this->product_picture);
        }

        return $image;
    }


    public function getProductPrice($type = 'str')
    {
        $product = $this;
        $final_price = 0;

        // return 'N/A';

        if ($product->pricing_type == 'fix_price') {

            if ($product->surcharge_at_product == 'yes') {

                if ($product->markup_type == 'flat') {
                    $final_price = $product->mark_up + $product->fixed_amount;
                } else {
                    $final_price = $product->fixed_amount + (($product->fixed_amount / 100) * $product->mark_up);
                }
            } else {
                // $product->category()->;
                $final_price = $product->fixed_amount;
            }
        } else {



            try {

                $gold_price = 0;

                if (Session::get('gold_price') && Carbon::now()->timestamp < Session::get('gold_price_expires_at')) {

                    $gold_price = Session::get('gold_price');
                } else {

                    $response = Http::get('http://150.242.218.15:3080/');
                    $resp = $response->object();
                    $gold_price = $resp->ask;

                    Session::put('gold_price', $gold_price);
                    Session::put('gold_price_expires_at', Carbon::now()->addMinutes(10)->timestamp);
                }

                if ($product->surcharge_at_product == 'yes') {

                    $price = ($product->weight * $gold_price);

                    if ($product->markup_type == 'flat') {
                        $final_price = $product->mark_up + $price;
                    } else {
                        $final_price = $price + (($price / 100) * $product->mark_up);
                    }
                } else {
                    $final_price = ($product->weight * $gold_price);
                }
            } catch (\Throwable $th) {
                //throw $th;
                return 'N/A';
            }
        }

        if ($type == 'str') {
            return number_format($final_price, 2) . ' USD';
        }

        return $final_price;
    }

    public function getProductCommission()
    {
        if (isset($this->mark_up)) {
            if ($this->markup_type == 'flat') {
                return $this->mark_up;
            } else {
                $price = $this->getProductPrice($type = 'number');
                if (gettype($price) == 'double') {
                    $percentage = ($price / 100) * $this->mark_up;
                    return $percentage;
                    // dd($percentage);
                }
            }
        } else {
            return null;
        }
    }

    public function productsInventory($quantity)
    {
        $inventory = Inventory::where('product_id', $this->id)->sum('units');
        // dd($inventory);
        if ($inventory > 0 && $inventory > $this->on_hold) {
            if ($inventory > $quantity) {
                return $inventory;
            }
        }
        return null;
    }

    public function productsQuantity()
    {
        $inventory = Inventory::where('product_id', $this->id)->sum('units');
        // dd($inventory);
        if ($inventory > 0 && $inventory > $this->on_hold) {
            return $inventory;
        }
        return null;
    }
}
