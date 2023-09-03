<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'idOrder',
        'emailClient',
        'nameClient',
        'telClient',
        'addressClient',
        'product',
        'note',
        'sumPrice',
        'status',
    ];
}
