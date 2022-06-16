<?php

namespace App\Models\DB;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tax extends DBModel
{
    use HasFactory;
    
    protected $guarded = [];
    
    protected $table = 'taxes';
}