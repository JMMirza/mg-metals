<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'full_name',
        'gender',
        'user_id',
        'phone_number',
        'nationality',
        'passport_no',
        'bank_account_name',
        'bank_account_number',
        'bank_name',
        'bank_branch_number',
        'bank_country_name',
        'bank_swift_code',
        'sales_rep_name',
        'sales_rep_number',
        'sales_rep_country',
        'strorage_service'
    ];

    protected $dates = [

        'created_at',
        'updated_at',
    ];

    protected $casts = [
        'created_at' => 'date:d M, Y H:i',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function agent_customers()
    {
        return $this->hasMany(AgentCustomer::class);
    }

    public function customer_products()
    {
        return $this->hasMany(CustomerProduct::class);
    }
}
