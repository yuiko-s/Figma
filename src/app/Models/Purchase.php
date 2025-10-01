<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use App\Models\user;
use App\Models\purchase;
use App\Models\item;

class Purchase extends Model
{
    protected $table = 'purchase'; 
    protected $fillable = ['item_id', 'buyer_id', 'paymentmethod', 'status'];


    public function item()
    {
        return $this->belongsTo(Item::class, 'item_id');
    }

    public function buyer()
    {
        return $this->belongsTo(User::class, 'buyer_id');
    }
}

