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
    use HasFactory;

    protected $fillable = [
        'item_id' => 'required',
        'buyer_id' => 'required',        
    ];


    public function item()
    {
        return $this->belongsTo(Item::class);
    }

    public function showPurchase()
    {
        $buyer_id = Auth::id()->with('item')->latest()->get();

        return view('purchases.index', compact('purchases'));
    }
}

