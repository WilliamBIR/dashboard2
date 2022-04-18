<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ObjectDetector;
use App\Models\EmotionDetector;
use App\Models\GenderDetector;
use App\Models\AgeDetector;
use App\Models\Product;
use App\Models\Iteraccion;

class ImageController extends Controller
{
    public function data(Request $request){
        $emo = null;$obj=null;$gen=null;$ed=null;$pro=null;$pro_id=null;
        if(request('objeto')){
            $obj = ObjectDetector::created([]);
        }
        
        if(request('productos')){
            if(strpos(request('productos'), ',',0)===false){
                $productos = str_replace(array("[","]"),"",request('productos'));
                $productos = array($productos);
            }else{
                $productos = str_replace(array("[","]"),"",request('productos'));
                $productos = explode(",",$productos);
            }
            foreach($productos as $producto){
                $pro = Product::created(['status'=>$pro]);
            }
        }

        if(request('iteracciones')){
            if(strpos(request('iteracciones'), ',',0)===false){
                $iteracciones = str_replace(array("[","]"),"",request('iteracciones'));
                $iteracciones = array($iteracciones);
            }else{
                $iteracciones = str_replace(array("[","]"),"",request('iteracciones'));
                $iteracciones = explode(",",$iteracciones);
            }
            foreach($iteracciones as $iteraccion){
                $pro_id = Iteraccion::created(['product_id'=>$pro_id]);
            }
        }
        
        $val = [($obj?$obj:'Sin Datos'),($pro?$pro:'Sin Datos'),($pro_id?$pro_id:'Sin Datos')];
        return $val;
    }

    public function storage(Request $request){
        $texto = explode("'",request('image'));
        // $archivo = fopen("image.txt", "w");
        //  fwrite($archivo, $texto[1]);
        // fclose($archivo);

        $img = base64_decode($texto[1]);
        is_dir('res/img/'.request('folder').'/')?'':mkdir('res/img/'.request('folder').'/', 0777, true);    
        file_put_contents('res/img/'.request('folder').'/'.request('name').'.jpg', $img);    
       return 'exito';
    }
}
