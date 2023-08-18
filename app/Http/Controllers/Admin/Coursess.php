<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Courses;

class Coursess extends Controller
{
    public function add()
    {
        return view('admin/courses/add');
    }
    public function coursesinsert(Request $request)
    {
        $request->validate([

            'title' => 'required',
            'description' => 'required',
            'image' => 'required|image|max:2048'

        ]);
        $datainsert = new Courses();
        $datainsert->title = $request->get('title');
        $datainsert->description = $request->get('description');

        if ($request->hasFile('image')) {
            $photo = $request->file('image');
            // $photo->getClientOriginalName();
            $photoName = rand(10000, 99999) . '.' . $photo->getClientOriginalExtension();

            $photo->move(public_path('image'), $photoName);
        }
        $datainsert->image = $photoName;
        $datainsert->save();
        return redirect()->route('admin/coursess/list');
    }
    public function list()
    {
        $lists = Courses::select('*')->get();
        return view('admin/courses/list', compact('lists'));
    }
    public function edit($id)
    {
        // Courses::find()
        $data = Courses::select('*')->where('id', $id)->first();
        return view('admin/courses/edit', compact('data'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([

            'title' => 'required',
            'description' => 'required',

        ]);
        $imageName="";
        if($imageName==""){
            $imageName=$request->get('hidden_text');
        }
        if ($request->hasFile('image')) {
            $photo = $request->file('image');
            // $photo->getClientOriginalName();
            $imageName = rand(10000, 99999) . '.' . $photo->getClientOriginalExtension();

            $photo->move(public_path('image'), $imageName);
        }
       
        Courses::where('id',$id)->update([
            'title'=>$request->get('title'),
            'description'=>$request->get('description'),
            'image'=>$imageName

        ]);
        return redirect()->route('admin/coursess/list');
    }

    public function delete($id){
       Courses::where('id',$id)->delete();
       return redirect()->back();
    }
    public function trash(){
        $lists=Courses::onlyTrashed()->get();
        return view('admin/courses/customer-trash',compact('lists'));
     }
     public function restore($id){
        Courses::withTrashed()->where('id',$id)->restore();
        return redirect()->route('admin/coursess/list');
     }
     public function forceDelete($id){
        Courses::withTrashed()->where('id',$id)->forceDelete();
        return redirect()->back();
     }

}