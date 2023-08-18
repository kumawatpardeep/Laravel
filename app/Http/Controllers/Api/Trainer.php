<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Trainers;

class Trainer extends Controller
{
    public function trainer_api()
    {
        try {
            $data = Trainers::get();

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
    public function trainer_insert_api(Request $request)
    {
        try {
            if ($request->hasFile('image')) {
                $photo = $request->file('image');
                // $photo->getClientOriginalName();
                $photoName = rand(1000, 9999) . '.' . $photo->getClientOriginalExtension();

                $photo->move(public_path('image'), $photoName);
            }
            $trainer = new Trainers;
            $trainer->name = $request->get('name');
            $trainer->position = $request->get('position');
            $trainer->about = $request->get('about');
            $trainer->image = $photoName;
            $trainer->save();

            return response()->json([
                'status' => true,
                'message' => 'success',
                'data' => $trainer

            ]);
        } catch (\Exception $r) {
            return response()->json([
                'status' => false,
                'message' => $r->getMessage(),
                'data' => []
            ]);
        }
    }
    public function fetch_api($id)
    {

        try {
            $students = Trainers::where('id',$id)->first();



            if ($students) {
                return response()->json([
                    'status' => 200,
                    'message' => 'success',
                    'data' => $students
                ]);
            } else {
                return response()->json([
                    'status' => 400,
                    'message' => 'do not id',
                ]);
            }
        } catch (\Exception $i) {
            return response()->json([
                'status' => 400,
                'messgae' => $i->getMessage(),
                'data' => []
            ]);
        }
    }
    public function api_trainer_update(Request $request,$id){
         try{
            if ($request->hasFile('image')) {
                $photo = $request->file('image');
                // $photo->getClientOriginalName();
                $photoName = rand(1000, 9999) . '.' . $photo->getClientOriginalExtension();

                $photo->move(public_path('image'), $photoName);
            }
            $data=Trainers::where('id',$id)->update([
                'name'=>$request->get('name'),
                'position'=>$request->get('position'),
                'about'=>$request->get('about'),
                'image'=>$photoName

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

    public function delete_api($id){
        try{
            $data=Trainers::where('id',$id)->delete();

            if($data){
            return response()->json([
                'status'=>200,
                'message'=>'success',
                'data'=>$data
            ],200);
        }else{
            return response()->json([
                'status'=>400,
                'message'=>'not deleted',
            ],400);
        }
        }catch(\Exception $ii){
            return response()->json([
                'status'=>400,
                'message'=>$ii->getMessage(),
                'data'=>[]
            ],400);
        }
    }
}