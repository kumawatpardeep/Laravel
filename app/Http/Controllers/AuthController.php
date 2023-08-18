<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Models\User;
use Auth;
class AuthController extends Controller
{
    public function register(Request $request)
   {
    try{
        Validator::make($request->all(), [
           'name' => 'required',
           'email' => 'required|email',
           'password' => 'required',
       ]);
 
    //    if($validator->fails()){
    //        return $this->sendError('Validation Error.', $validator->errors());      
    //    }
 
       $input = $request->all();
       $input['password'] = bcrypt($input['password']);
       $user = User::create($input);
       $success['token'] =  $user->createToken('MyApp')->plainTextToken;
       $success['name'] =  $user->name;
 
    //    return $this->sendResponse($success, 'User register successfully.');
    return response()->json([
        'status'=>true,
        'message'=>'User register successfully',
        'data'=>$success
    ]);
}catch(\Exception $i){
    return response()->json([
        'status'=>false,
        'message'=>$i->getMessage()
    ]);
}
   }
   public function login(Request $request)
   {
    try{
       if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
           $user = Auth::user();
           $success['token'] =  $user->createToken('MyApp')->plainTextToken;
           $success['name'] =  $user->name;
 
        //    return $this->sendResponse($success, 'User login successfully.');
        return response()->json([
            'status'=>true,
            'message'=>'User Login Successfully',
            'data'=>$success
        ]);
       }
       else{
        //    return $this->sendError('Unauthorised.', ['error'=>'Unauthorised']);
        return response()->json([
            'status'=>false,
            'message'=>'Unauthorised'
        ]);
       }
    }catch(\Exception $i){
        return response()->json([
            'status'=>false,
            'message'=>$i->getMessage()
        ]);
    }
   } 

   public function logoutsss(Request $request)
   {
    try{
       $request->user()->currentAccessToken()->delete();
          return response()->json([
            'status'=>true,
            'message'=>'Logged out successfully'
          ]);
    //    return response()->json(['message' => 'Logged out successfully'], 200);
}catch(\Exception $i){
    return response()->json([
        'status'=>false,
        'message'=>$i->getMessage()
    ]);
}
   }
   public function profile(Request $request){
    return $request->user();

   }

   
}
