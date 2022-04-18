<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Iteraccion;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ApiController extends Controller
{
    public function store(Request $request){
        $creaiter= new Iteraccion;

        $creaiter->product_id=$request->product_id;
        $creaiter->save();
        return response()->json($creaiter);
    }
}