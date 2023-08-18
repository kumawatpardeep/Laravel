<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class Categorys extends Controller
{
    public function category(){
        try{
            $data=Category::get();

            return response()->json([
                'status'=>true,
                'message'=>'success',
                'data'=>$data
            ]);
        }catch(\Exception $i){
            return response()->json([
                'status'=>false,
                'messagae'=>$i->getMessage(),
                'data'=>[]
            ]);
        }
    }
}
