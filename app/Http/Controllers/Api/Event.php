<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Events;

class Event extends Controller
{
    public function enent_api()
    {
        try {
            $data = Events::get();

            return response()->json([
                'status' => true,
                'message' => 'success',
                'data' => $data
            ]);
        } catch (\Exception $r) {
            return response()->json([
                'status' => false,
                'message' => $r->getMessage(),
                'data' => []
            ]);
        }
    }
    public function event_insert_list(Request $request)
    {

        try {


            if ($request->hasFile('image')) {
                $photo = $request->file('image');
                // $photo->getClientOriginalName();
                $photoName = rand(10000, 99999) . '.' . $photo->getClientOriginalName();

                $photo->move(public_path('image'), $photoName);
            }


            $datainsert = new Events();
            $datainsert->title = $request->get('title');
            $datainsert->description = $request->get('description');
            $datainsert->image = $photoName;
            $datainsert->save();

            return response()->json([
                'status' => true,
                'message' => 'success',
                'data' => $datainsert
            ]);
        }catch(\Exception $e){
            return response()->json([
                'status'=>false,
                'message'=>$e->getMessage(),
                'data'=>[]
            ]);
        }
    }
    public function fetch_event_api($id){
        try{
            $data=Events::where('id',$id)->first();
            return response()->json([
                'status'=>true,
                'message'=>'successfullly fetch',
                'data'=>$data
            ]);
        }catch(\Exception $i){
            return response()->json([
                'status'=>true,
                'message'=>$i->getMessage()
            ]);
        }
    }
    public function update_event_api(Request $request,$id){
        try{
            if ($request->hasFile('image')) {
                $photo = $request->file('image');
                // $photo->getClientOriginalName();
                $photoName = rand(10000, 99999) . '.' . $photo->getClientOriginalName();

                $photo->move(public_path('image'), $photoName);
            }
            $data=Events::where('id',$id)->update([
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