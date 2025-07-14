<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public static function store($r){
        $r->validate([
            'name' => 'required | min:2 | max:50',
        ]);
        $category = new Category();
        $category->name = $r->name;
        $category->desc = $r->desc;
        $category->save();
        
    }
}
