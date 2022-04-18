<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GenderDetector extends Model
{
    use HasFactory;

    protected $fillable = [
        'gender'
    ];

    public static function created($request)
    {
        $gd = new GenderDetector;
        $gd->gender = $request['gender'];
        $gd->save();
        return $gd;
    }
}
