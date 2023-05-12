<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function items()
    {
        return $this->belongsToMany(Cart::class, 'cart_item', 'item_id', 'cart_id')->withPivot('quantity');
    }
    
    public function order()
    {
        return $this->hasOne(Order::class);
    }
    protected $fillable = [
        'user_id',
    ];

    use HasFactory;
}

