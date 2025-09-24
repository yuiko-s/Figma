<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Like;
use App\Models\User;

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
        'user_id',
    ];

    protected $casts = [
        'is_sold' => 'bool',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function likes() {
        return $this->hasMany(Like::class);
    }
}
