<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Checkout extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'amount',
        'status',
        'log',
    ];

    protected $casts = [
        'user_id' => 'integer',
        'amount' => 'decimal:2',
    ];
}
