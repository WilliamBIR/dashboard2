<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmotionDetector extends Model
{
    use HasFactory;

    protected $fillable = [
        'emotion'
    ];

    public static function created($request)
    {
        $ed = new EmotionDetector;
        $ed->emotion = $request['emotion'];
        $ed->save();
        return $ed;
    }
}
