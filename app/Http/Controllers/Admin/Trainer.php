<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Trainers;

class Trainer extends Controller
{
    public function add()
    {
        return view('admin/trainer/add');
    }
    public function trainerInsert(Request $request)
    {
        $request->validate([

            'name' => 'required',
            'position' => 'required',
            'about' => 'required',
            'image' => 'required'

        ]);
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
        return redirect()->route('admin/trainer/list');


    }
    public function list(){
        $data=Trainers::all();
        return view('admin/trainer/list',compact('data'));
    }
    public function edit($id)
    {
        // Courses::find()
        // $data = Trainer::select('*')->where('id', $id)->first();
        $data=Trainers::find($id)->first();
        return view('admin/trainer/edit', compact('data'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([

            'name' => 'required',
            'position' => 'required',
            'about' => 'required',

        ]);
        $photoName="";
        if($photoName==""){
            $photoName=$request->get('hidden_text');
        }
        if($request->hasFile('image')){
            $photo=$request->file('image');
            $photoName=rand(10,99).'.'.$photo->getClientOriginalExtension();
            $photo->move(public_path('image'),$photoName);
        }
        Trainers::where('id',$id)->update([
            'name'=>$request->get('name'),
            'position'=>$request->get('position'),
            'about'=>$request->get('about'),
            'image'=>$photoName
        ]);
        return redirect()->route('admin/trainer/list');
    }
    public function delete($id){
        Trainers::where('id',$id)->delete();
        return redirect()->back();
    }
    public function trash(){
        $data=Trainers::onlyTrashed()->get();
        return view('admin/trainer/trainer-trash',compact('data'));
    }
    public function restore($id){
        Trainers::withTrashed()->where('id',$id)->restore();
        return redirect()->route('admin/trainer/list');
    }
    public function forceDelete($id){
        Trainers::withTrashed()->where('id',$id)->forceDelete();
        return redirect()->back();
    }
}