<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Userss;

class User extends Controller
{
    public function add(){
        return view('admin/users/add');
    }
    public function addvali(Request $request){
        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'password'=>'required',
            'mobile'=>'required',
            'address'=>'required',

        ]);

        $useradd=new Userss;
        $useradd->name=$request->get('name');
        $useradd->email=$request->get('email');
        $useradd->password=$request->get('password');
        $useradd->mobile=$request->get('mobile');
        $useradd->address=$request->get('address');
        $useradd->save();

return redirect()->route('admin/users/list');
    }
    public function list(){
        $data=Userss::select("*")->get();
 
        return view('admin/users/list',compact('data'));
     }
     public function edit($id){
        $editss=Userss::select('*')->where('id',$id)->first();
        // $editss=UserAdd::find($id);
        
    
        return view('admin/users/edit',compact('editss'));
      }
      public function update(Request $request,$id){
        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'password'=>'required',
            'mobile'=>'required',
            'address'=>'required',
    
        ]);
        // $datas=UserAdd::find($id);
        Userss::where('id',$id)->update([
            'name'=>$request->get('name'),
            'email'=>$request->get('email'),
            'password'=>$request->get('password'),
            'mobile'=>$request->get('mobile'),
            'address'=>$request->get('address'),
    
        ]);
        return redirect()->route('admin/users/list');
    
      }
      public function delete($id){
        Userss::where('id',$id)->delete();
        return redirect()->back();
      }
}
