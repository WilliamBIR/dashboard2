<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AgeDetector extends Model
{
    use HasFactory;

    protected $fillable = [
        'age'
    ];

    public static function created($request)
    {
        $ad = new AgeDetector;
        $ad->age = $request['age'];
        $ad->save();
        return $ad;
    }
}
