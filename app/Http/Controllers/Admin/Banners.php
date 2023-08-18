<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banner;

class Banners extends Controller
{
    public function add()
    {
        
        return view('admin/banner/add');
    
    }
    public function addvali(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'image' => 'required|image|mimes:png,jpg,gif'
        ]);
        try{
        
        $datainsert = new Banner();
        $datainsert->title = $request->get('title');
        if ($request->hasFile('image')) {
            $photo = $request->file('image');
            // $photo->getClientOriginalName();
            $photoName = rand(10, 99) . '.' . $photo->getClientOriginalExtension();

            $photo->move(public_path('image'), $photoName);
        }
        $datainsert->image = $photoName;
        $datainsert->save();

        if($datainsert){
            return redirect()->route('admin/banner/list');
        }
        else{
            return back();
    }

     } catch(\Exception $ii){
        return back()->withErrors($ii->getMessage())->withInput();
     }

    }
    public function lists()
    {
        try{
            // $lists=Banner::all();
        $lists = Banner::select('*')->paginate(2);
        return view('admin/banner/list', compact('lists'));
        }
        catch(\Exception $i){
            return back()->withErrors($i->getMessage())->withInput();
        }
    }
    public function edit($id)
    {
        try{
        $user = Banner::select("*")->where('id', $id)->first();
        return view('admin/banner/edit', compact('user'));
       }catch(\Exception $i){
        return back()->withErrors($i->getMessage())->withInput();
       }
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            //   'image'=>'required'
        ]);
        $photoName = "";
        if ($photoName == "") {
            $photoName = $request->get('hidden_imgae');
        }
        if ($request->hasFile('image')) {
            $photo = $request->file('image');
            // $photo->getClientOriginalName();
            $photoName = rand(10000, 99999) . '.' . $photo->getClientOriginalExtension();

            $photo->move(public_path('image'), $photoName);
        }
        Banner::where('id', $id)->update([
            'title' => $request->get('title'),
            'image' => $photoName
        ]);
        return redirect()->route('admin/banner/list');
    }
    public function delete($id)
    {
        Banner::where('id', $id)->delete();
        //    DB::table('images')->select('*')->where('delete_at','!=',null)->get();

        return redirect()->back();
    }
}