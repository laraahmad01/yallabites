<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    use HasFactory;

    protected $table = 'cart_item';

    public function cart()
    {
        return $this->belongsTo(Cart::class);
    }

    public function item()
    {
        return $this->belongsTo(Item::class);
    }

    public function menu()
    {
        return $this->belongsTo(Menu::class, 'menu_id');
    } 
    protected $fillable = ['cart_id','item_id','quantity',];
}
