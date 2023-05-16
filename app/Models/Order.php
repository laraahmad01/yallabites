<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function store()
    {
        return $this->belongsTo(Store::class);
    }
    
    public function cart()
    {
        return $this->belongsTo(Cart::class);
    }
    protected $fillable = [
        'user_id',
        'store_id',
        'address',
        'payment_option',
        'total',
        'delivery_charge',
        'subtotal',
    ];
    protected $status = 'pending';
use HasFactory;    
}

