<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
    'buyer_id',
    'item_id',
    'price',
    'status',
    'postal_code',
    'prefecture',
    'city',
    'address_line',
    'phone_number',
];

}
