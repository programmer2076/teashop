<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuStack extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'stack_id',
        'menu_id',
        'price',
        'status'
    ];

    protected $casts = [
        'user_id' => 'integer',
        'stack_id' => 'integer',
        'menu_id' => 'integer',
        'price' => 'decimal:2',
        'image' => 'string',
    ];

    protected $with = ['menu'];

    public function menu(){
        return $this->belongsTo(Menu::class);
    }
}
