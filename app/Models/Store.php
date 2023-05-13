<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function location()
    {
        return $this->belongsTo(Location::class);
    }
    
    public function cuisine()
    {
        return $this->belongsTo(Cuisine::class);
    }
    
    public function menus()
    {
        return $this->hasMany(Menu::class);
    }
    
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
    
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
    protected $fillable = [
        'user_id',
        'name',
        'location_id',
        'description',
        'cuisine_id',
        'is_accepted',
    ];
    
    use HasFactory;
}