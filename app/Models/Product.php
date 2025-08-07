<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Support\Str;


class Product extends Model implements HasMedia
{
    use InteractsWithMedia;

    //Updated Karat and Grams in Product Table
    protected static function booted()
    {
        static::saving(function ($product) {
            $goldPrice = GoldPrice::where('karat', $product->karat)->first();

            if ($goldPrice) {
                $product->price = $goldPrice->price_per_gram * $product->grams;
            }
        });
    }

    //Generates Code for the Products
    public static function boot()
    {
        parent::boot();

        static::creating(function ($product) {
            $typePrefix = [
                'ring' => 'RNG',
                'bracelet' => 'BRC',
                'earring' => 'ERG',
                'necklace' => 'NCK',
            ];

            $prefix = $typePrefix[strtolower($product->type)] ?? 'PRD';

            // Sanitize karat like "18k" → "18K"
            $karat = strtoupper($product->karat);

            // Get latest ID + 1 and pad
            $latestId = Product::max('id') + 1;
            $sequence = str_pad($latestId, 5, '0', STR_PAD_LEFT);

            $product->code = "{$prefix}-{$karat}-{$sequence}";
        });
    }

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
