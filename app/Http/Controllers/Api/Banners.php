<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banner;

class Banners extends Controller
{
    public function banner_api()
    {
        try {
            $data = Banner::select("*")->get();

            return response()->json([
                "status" => true,
                "message" => 'successfully insertes',
                "data" => $data
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => $e->getMessage(),
                'data' => []
            ]);
        }

    }
    public function banner_insert_api(Request $request){
       try{
       
        if ($request->hasFile('image')) {
            $photo = $request->file('image');
            // $photo->getClientOriginalName();
            $photoName = rand(10, 99) . '.' . $photo->getClientOriginalExtension();

            $photo->move(public_path('image'), $photoName);
        }
        $datainsert = new Banner();
        $datainsert->title = $request->get('title');
        $datainsert->image = $photoName;
        $datainsert->save();

        return response()->json([
             'status'=>true,
             'message'=>'success',
             'data'=>$datainsert
        ]);
       }catch(\Exception $s){
    return response()->json([
       'status'=>false,
       'message'=>$s->getMessage(),
       'data'=>[]
    ]);
       }
    }
    public function fetch_banner_api($id){
        try{
            $data=Banner::where('id',$id)->first();
            return response()->json([
                'status'=>true,
                'message'=>'successfully Fetched data',
                'data'=>$data
            ]);
        }catch(\Exception $i){
            return response()->json([
                'status'=>false,
                'message'=>$i->getMessage()
            ]);
        }
    }

    public function banner_update_api(Request $request,$id){
        try{
            if ($request->hasFile('image')) {
                $photo = $request->file('image');
                // $photo->getClientOriginalName();
                $photoName = rand(10, 99) . '.' . $photo->getClientOriginalExtension();
    
                $photo->move(public_path('image'), $photoName);
            }
            $data=Banner::where('id',$id)->update([
                'title'=>$request->get('title'),
                'image'=> $photoName
            ]);
            return response()->json([
                'status'=>true,
                'message'=>'successfully Updated',
                'data'=>$data
            ]);
        }catch(\Exception $i){
            return response()->json([
                'status'=>false,
                'message'=>$i->getMessage()
            ]);
        }
    }
}