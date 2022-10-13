<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Desk extends Model
{
    use HasFactory;

    protected $fillable = ['tag', 'image'];

    protected $casts = [
        'tag'  => 'string',
        'image' => 'string',
    ];

    // public function getImageAttribute()
    // {
    //   return $this->attributes['image'] ? URL::to('/desk/' . $this->attributes['image']) : null; 
    // }
}


