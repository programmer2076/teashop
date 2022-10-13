<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'name',
        'description',
        'price',
        'image'
    ];

    protected $casts = [
        'category_id' => 'integer',
        'name'  => 'string',
        'description' => 'string',
        'price' => 'decimal:2',
        'image' => 'string',
    ];

    protected $with = ['category'];

    public function category(){
        return $this->belongsTo(Category::class);
    }

}
