<?php

namespace App\Models\DB;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductsCategory extends DBModel
{
    use HasFactory;

    protected $with = ['products'];

    public function products()
    {
        return $this->hasMany(Product::class, 'category_id');
    }
}