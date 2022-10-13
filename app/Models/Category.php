<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    protected $casts = [
        'name'  => 'string',
    ];

    public function menus(){
        return $this->hasMany(Menu::class);
    }

}
