<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cuisine extends Model
{
    public function stores()
    {
        return $this->hasMany(Store::class);
    }
    protected $fillable = [
        'name',
    ];
    use HasFactory;

}

