<?php

namespace App\Models\DB;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends DBModel
{
    use HasFactory;

    protected $guarded = [];

    protected $table = 'customers';

    public function fingerprints()
    {
        return $this->hasMany(Fingerprint::class, 'customer_id');
    }

    public function sales()
    {
        return $this->hasMany(Sale::class, 'customer_id');
    }
}
