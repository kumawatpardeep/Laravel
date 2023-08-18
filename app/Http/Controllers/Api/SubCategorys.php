<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SubCategory;

class SubCategorys extends Controller
{
    public function subCategory(){
        try{
            $data=SubCategory::get();
            return response()->json([
                'status'=>true,
                'message'=>'success',
                'data'=>$data
            ]);
        }catch(\Exception $i){
            return response()->json([
                'status'=>false,
                'message'=>$i->getMessage(),
                'data'=>[]
            ]);
        }
    }
    public function store(Request $request,$id){
        try{
                $data=new SubCategory;
                $data->name=$request->get('name');
                $data->categorie_id=$id;
                $data->save();
                return response()->json([
                    'status'=>true,
                    'message'=>'success',
                    'data'=>$data
                ]);
        }catch(\Exception $i){
            return response()->json([
                'status'=>false,
                'message'=>$i->getMessage(),
                'data'=>[]
            ]);
        }
    }
}
