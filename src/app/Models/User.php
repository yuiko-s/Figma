<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Like;
use App\Models\Item;


class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function items() 
    {
    return $this->hasMany(Item::class);
    }
    public function likes()
    {
	return $this->hasMany(Like::class);
    }

    public function like($itemId)
    {
        // いいねがまだなら追加
        if (! $this->likes()->where('item_id', $itemId)->exists()) {
        return $this->likes()->create([
            'item_id' => $itemId,
        ]);
    }
        return false;
    }

    public function unlike($itemId)
    {
     // いいねしていれば削除
     return $this->likes()->where('item_id', $itemId)->delete();
    }

//マイページ
    public function sellitems()
    {
    return $this->hasMany(\App\Models\Item::class, 'user_id');
    }

    public function orders() {
    return $this->hasMany(\App\Models\Order::class, 'buyer_id');
    }

    public function ordersItems() {
    return $this->belongsToMany(\App\Models\Item::class, 'orders', 'buyer_id', 'item_id')
                ->withTimestamps();
    }
}