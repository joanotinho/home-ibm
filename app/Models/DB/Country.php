<?php
  
namespace App\Models\DB;
  
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
  
class Country extends Model
{
    use HasFactory;
  
    protected $fillable = [
        'name', 'code'
    ];
}