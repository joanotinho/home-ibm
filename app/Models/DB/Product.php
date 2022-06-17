<?php

namespace App\Models\DB;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Debugbar;

class Product extends DBModel
{
    use HasFactory;

    protected $guarded = [];

    protected $table = 'products';
    
    public function category()
    {
        return $this->belongsTo(ProductCategory::class)->where('active', 1);
    }

    public function prices()
    {
        return $this->hasMany(Price::class)->where('valid', 1)->where('active', 1);
    }
}