<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
    'item_id',
    'buyer_id',
    'paymentprice',
    'paymentmethod',
    'postal_code',
    'shippingaddress'
];

}
