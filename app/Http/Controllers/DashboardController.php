<?php

namespace App\Http\Controllers;

use App\Models\AgeDetector;
use App\Models\CountPeople;
use App\Models\EmotionDetector;
use App\Models\GenderDetector;
use App\Models\ObjectDetector;
use App\Models\Product;
use App\Models\Iteraccion;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index (){
        $entradas = count(CountPeople::all()->where('type','Entro'));
        $salidas = count(CountPeople::all()->where('type','Salio'));
        $peoples = [$entradas,$salidas];


        $label = [];
        $pro1xmes = [];
        $pro2xmes = [];
        $pro3xmes = [];
        $pro4xmes = [];

        if(count(Iteraccion::all())>0){
            $productosxmes= Iteraccion::all();
  //          $fechaactual=date('n');
  //          echo($fechaactual . '<br/>');
            foreach($productosxmes as $producto){
                $bol =false;
                $mes = explode('-',$producto->created_at)[1];
                $monthName = date('F', mktime(0, 0, 0, $mes, 10));
                foreach($label as $lab){
                    if($lab == $monthName){$bol = true;}
                }

                if(!$bol){
                    array_push($label,$monthName);
                    $producto->product_id == 1?array_push($pro1xmes,1):array_push($pro1xmes,0);
                    $producto->product_id == 2?array_push($pro2xmes,1):array_push($pro2xmes,0);
                    $producto->product_id == 3?array_push($pro3xmes,1):array_push($pro3xmes,0);
                    $producto->product_id == 4?array_push($pro4xmes,1):array_push($pro4xmes,0);
                }else{
                    $pos = array_search($monthName,$label);
                    if($producto->product_id==1){
                       $pro1xmes[$pos] = $pro1xmes[$pos] + 1;
                    }
                    elseif($producto->product_id==2){
                        $pro2xmes[$pos] = $pro2xmes[$pos] + 1;
                    }
                    elseif($producto->product_id==3){
                        $pro3xmes[$pos] = $pro3xmes[$pos] + 1;
                    }
                    else{
                        $pro4xmes[$pos] = $pro4xmes[$pos] + 1;
                    }
                   
                }
            }
        }

        $proxmes=[$pro1xmes,$pro2xmes,$pro3xmes,$pro4xmes];

        //Filtro para los horarios del día:
        //$lasthoundred=Iteraccion::lastest()->where(['product_id',1],[''])
        //$aux=Iteraccion::lastest()->take(50)->whereDate('created_at','=',Carbon::now()->toDateString()->groupBy('hour')->get());
        //$product1xhour=count(Iteraccion::latest()->take(50)->where('product_id',1)->whereTime('created_at', '>=', Carbon::parse('22:00'))->whereTime('created_at', '<=', Carbon::parse('23:59:59'))->get());
        $totalproductos=count(Product::all());
        //echo($totalproductos . '<br/>');
        $totalxhoras=[];
        $products=[];
        for($j=1;$j<$totalproductos+1;$j++){
            $producttotal=count(Iteraccion::all()->where('product_id',$j));
            array_push($products,$producttotal);
            $pxh=[0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0];
            for($i=0;$i<16;$i++){
                $time1=strval($i+7).':00';
                $time2=strval($i+7) . ':59:59';
                //echo('tiempos entre' . $time1 . ' ' . $time2 . '<br/>');
                $productxhour=count(Iteraccion::latest()->take(50)->where('product_id',$j)->whereTime('created_at', '>=', Carbon::parse($time1))->whereTime('created_at', '<=', Carbon::parse($time2))->get());
                //echo($productxhour . '<br/>');
                
                $pxh[$i]=$productxhour;
            }
            array_push($totalxhoras,$pxh);
            
        }        

//        echo($products[0] . $products[1] . $products[2]. $products[3] . ' <br/>');
        return Inertia::render('Dashboard',['proxmes'=>$proxmes,'products'=>$products, 'peoples'=>$peoples,'label'=>$label,'proxhours'=> $totalxhoras]);
    }
}
