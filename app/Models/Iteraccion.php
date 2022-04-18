<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Iteraccion extends Model
{
    use HasFactory;
    protected $table='iteracciones';
    protected $fillable = [
        'product_id'
    ];

    public static function created($request)
    {
        $pro_id = new Product;
        $pro_id->product_id = $request['product_id'];
        $pro_id->save();
        return $pro_id;
    }
 
    
}