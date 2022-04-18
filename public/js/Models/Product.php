<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    public static function created($request)
    {
        $gd = new Product;
        $gd->name = $request['name'];
        $gd->save();
        return $gd;
    }
}

