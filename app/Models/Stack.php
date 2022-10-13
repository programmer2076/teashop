<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stack extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'desk_id',
        'token',
        'state',
    ];

    protected $casts = [
        'user_id' => 'integer',
        'desk_id' => 'integer',
        'token'  => 'string',
        'state' => 'boolean',
    ];

    public function menuStacks(){
        return $this->hasMany(MenuStack::class);
    }
}
