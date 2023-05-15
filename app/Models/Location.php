<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $fillable = [
        'street',
        'city',
        'state',
        'postal_code',
        'country',
        'code',
        'phone',
        'your_email'
    ];
}
