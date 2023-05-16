<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    
    public function menu()
    {
        return $this->belongsTo(Menu::class);
    }
    
    public function carts()
    {
        return $this->belongsToMany(Item::class, 'cart_item', 'cart_id', 'item_id')->withPivot('quantity');
    }

    public function cartItems()
    {
        return $this->hasMany(CartItem::class);
    }
    protected $fillable = [
        'menu_id',
        'category_id',
        'name',
        'price',
        'description',
        'calories',
        'image',
    ];

    use HasFactory;
}

