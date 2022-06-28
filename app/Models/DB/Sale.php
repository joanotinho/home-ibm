<?php

namespace App\Models\DB;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends DBModel
{
    use HasFactory;
    
    protected $guarded = [];
    
    protected $table = 'sales';
    
    public function carts()
    {
        return $this->hasMany(Cart::class)->where('active', 1);
    }

    public function payment()
    {
        return $this->belongsTo(PaymentMethod::class, 'payment_method_id')->where('active', 1);
    }
    
    public function customer()
    {
        return $this->belongsTo(Customer::class,);
    }
}