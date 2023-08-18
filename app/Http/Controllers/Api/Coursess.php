<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Courses;

class Coursess extends Controller
{
    public function courses_api(){
        try {
            $data=Courses::get();
            return response()->json([
                'status'=>true,
                'message'=>'success',
                'data'=>$data
            ]);
        } catch (\Exception $th) {
            return response()->json([
                'status'=>false,
                'message'=>$th->getMessage(),
                'data'=>[]
            ]);                                         
        }
    }
    public function Courses_insert_api(Request $request){
          
       
try{
        if ($request->hasFile('image')) {
            $photo = $request->file('image');
            // $photo->getClientOriginalName();
            $photoName = rand(10000, 99999) . '.' . $photo->getClientOriginalExtension();

            $photo->move(public_path('image'), $photoName);
        }
        $datainsert = new Courses();
        $datainsert->title = $request->get('title');
        $datainsert->description = $request->get('description');
        $datainsert->image = $photoName;
        $datainsert->save();
          
        $datainsert->save();

        return response()->json([
            'status'=>true,
            'message'=>'success',
            'data'=>$datainsert
        ]);

    }catch(\Exception $h){
        return response()->json([
            'status'=>false,
            'message'=>$h->getMessage(),
            'data'=>[]
        ]);
    }
    }

    public function fetch_coursess_api($id){
        try{
            $data=Courses::where('id',$id)->first();
            return response()->json([
                'status'=>true,
                'message'=>'successfully fetch',
                'data'=>$data

            ]);
        }catch(\Exception $i){
            return response()->json([
                'status'=>false,
                'message'=>$i->getMessage()
            ]);
        }
    }
    public function courses_update_api(Request $request,$id){
        try{
            if ($request->hasFile('image')) {
                $photo = $request->file('image');
                // $photo->getClientOriginalName();
                $photoName = rand(10000, 99999) . '.' . $photo->getClientOriginalExtension();
    
                $photo->move(public_path('image'), $photoName);
            }
            $data=Courses::where('id',$id)->update([
               'title' => $request->get('title'),
               'description' => $request->get('description'),
               'image' => $photoName
            ]);
            return response()->json([
                'status'=>true,
                'message'=>'successfully updated',
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
