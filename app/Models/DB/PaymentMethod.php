<?php

namespace App\Models\DB;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentMethod extends DBModel
{
    use HasFactory;
    
    protected $guarded = [];
    
    protected $table = 'payment_methods';

    public function sales()
    {
        return $this->hasMany(Sale::class, 'payment_method_id')->where('active', 1);
    }
    
}