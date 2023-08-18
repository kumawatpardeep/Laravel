<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cmss;

class Cms extends Controller
{
    public function cms_api()
    {
        try {
            $data = Cmss::get();
            return response()->json([
                'status' => true,
                'message' => 'success',
                'data' => $data
            ]);
        } catch (\Exception $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage(),
                'data' => []
            ]);
        }
    }
    public function store(Request $request)
    {
        try {
            $data = new Cmss;
            $data->title = $request->title;
            $data->description = $request->description;
            $data->save();
            return response()->json([
                'status' => true,
                'message' => 'success',
                'data' => $data
            ]);
        } catch (\Exception $h) {
            return response()->json([
                'status' => false,
                'message' => $h->getMessage(),
                'data' => []
            ]);
        }

    }
    public function fetch_cms_api($id){
        try{
            $data=Cmss::where('id',$id)->first();
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
    public function update_cms_api(Request $request,$id){
        try{
            $data=Cmss::where('id',$id)->update([
                'title'=>$request->get('title'),
                'description'=>$request->get('description')
            ]);
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