<?php

namespace App\Models\DB;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faq extends DBModel
{
    use HasFactory;

    protected $table = 't_faqs';
}
