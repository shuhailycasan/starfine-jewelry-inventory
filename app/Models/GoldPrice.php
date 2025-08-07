<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GoldPrice extends Model
{

    protected $fillable = [
        'karat',
        'price_per_gram'
    ];
}
