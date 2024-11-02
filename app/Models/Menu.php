<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Menu extends Model
{
    protected $fillable = [
        'name', 
        'price',
        'description'
    ];

  use HasFactory;

    // Other model properties and methods...

    public static function createMenuItems($count = 1)
    {
        return Menu::factory()->count($count)->create();
    }

}
