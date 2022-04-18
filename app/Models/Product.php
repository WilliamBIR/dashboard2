<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'status'
    ];

    public static function created($request)
    {
        $pro = new Product;
        $pro->status = $request['status'];
        $pro->save();
        return $pro;
    }

/*
    public function iteracciones()
    {
        return $this->hasMany(Iteraccion::class);
    }
    */
}

