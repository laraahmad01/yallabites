<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable = [
        'user_id',
    ];

    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function items()
    {
        return $this->belongsToMany(Item::class)
                    ->withPivot('quantity')
                    ->withTimestamps();
    }

    public function cartItems()
    {
        return $this->hasMany(CartItem::class);
    }
    public function order()
    {
        return $this->hasOne(Order::class);
    }
}