<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'nameProduct',
        'brandProduct',
        'idProduct',
        'sizeProduct',
        'imgProduct',
        'descriptionProduct',
        'priceProduct',
        'quantityProduct',
        'slug'
    ];

    // protected $casts = [
    //     'sizeProduct' => 'array'
    // ];

    public function brand(): BelongsTo
    {
        return $this->belongsTo(Brand::class);
    }

}
