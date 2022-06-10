<?php

namespace App\Models\DB;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCategory extends DBModel
{
    use HasFactory;
    
    protected $guarded = [];

    protected $table = 'products_categories';

    public function products()
    {
        return $this->hasMany(Product::class, 'category_id')->where('active', 1);
    }
}