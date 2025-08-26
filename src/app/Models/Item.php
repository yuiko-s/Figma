<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'image',
        'name',
        'brand',
        'price',
        'description',
        'info',
        'is_sold',
    ];

    public function purchase()
    {
        return $this->hasOne(Purchase::class);
    }
}
