<?php

namespace App\Models\DB;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Price extends DBModel
{
    use HasFactory;
    
    protected $guarded = [];

    protected $table = 'prices';

    public function product()
    {
        return $this->hasMany(Product::class, 'price_id')->where('active', 1);
    }

    public function tax()
    {
        return $this->belongsTo(Tax::class)->where('active', 1)->where('valid', 1);
    }
}