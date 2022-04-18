<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CountPeople extends Model
{
    use HasFactory;

    protected $fillable = [
        'type'
    ];

    public static function created($request)
    {
        $cp = new CountPeople;
        $cp->type = $request['type'];
        $cp->save();
        return $cp;
    }
}
