<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Item;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
    'item_id',
    'buyer_id',
    'paymentprice',
    'paymentmethod',
    'postal_code',
    'shippingaddress',
    'building_name'
    ];

    public function item() {
    return $this->belongsTo(\App\Models\Item::class);
    }
}
