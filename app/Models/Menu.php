<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    public function store()
    {
    return $this->hasOne(Store::class);
    }
    
    public function items()
    {
        return $this->hasMany(Item::class);
    }
    protected $fillable = [
        'store_id',
        'name',
        'image',
    ];
use HasFactory;    
}

