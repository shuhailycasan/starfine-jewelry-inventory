<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Support\Str;


class Product extends Model implements HasMedia
{
    use InteractsWithMedia;

    public function getFormattedStatusAttribute()
    {
        return Str::headline($this->status); // turns "out_of_stock" into "Out Of Stock"
    }
    public function getFormattedTypeAttribute()
    {
        return Str::headline($this->type); // "earring" → "Earring"
    }

    protected $fillable = [
        'name',
        'grams',
        'price',
        'type',
        'karat',
        'quantity',
        'description',
        'status'
        ];
}
