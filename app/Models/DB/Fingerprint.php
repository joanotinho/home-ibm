<?php

namespace App\Models\DB;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fingerprint extends DBModel
{
    use HasFactory;
    
    protected $guarded = [];

    protected $table = 'fingerprints';

    public function customers()
    {
        return $this->belongsTo(Customers::class);
    }


}