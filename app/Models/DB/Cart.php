<?php

namespace App\Models\DB;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends DBModel
{
    use HasFactory;
    
    protected $guarded = [];

    protected $table = 'carts';

    public function prices()
    {
        return $this->belongsTo(Price::class);
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function fingerprints()
    {
        return $this->belongsTo(Fingerprint::class);
    }

    public function sales()
    {
        return $this->belongsTo(Sale::class);
    }
}