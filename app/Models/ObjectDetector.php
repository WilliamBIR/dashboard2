<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ObjectDetector extends Model
{
    use HasFactory;

    public static function created($request)
    {
        $od = new ObjectDetector;
        $od->save();
        return $od;
    }
}
