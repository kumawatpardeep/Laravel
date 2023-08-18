<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class Categorys extends Controller
{
    public function cotegory()
    {
        try {
            return view('admin/category/add');
        } catch (\Exception $i) {
            return back()->withError($i->getMessage());
        }
    }
    public function cotegorys(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);

        try {

            $data = new Category;
            $data->name = $request->get('name');
            $data->save();
            // return response()->json(['message' => 'data inserted successfully']);
            return redirect()->route('catorgay/list');
        } catch (\Exception $i) {
            return $i->getMessage();
        }
    }
    public function list(){
        try{
            $data=Category::select("*")->get();
            return view('admin/category/list',compact('data'));
        }catch(\Exception $i){
            return $i->getMessage();
        }
    }

    public function Category_status($id){
        
        $cotegray=Category::select('status')->where('id',$id)->first();
        if($cotegray->status=='1'){
            $status='0';
        }
        else{
            $status='1';
        }
        $values=array('status'=>$status);
        Category::where('id',$id)->update($values);
        return redirect()->route('catorgay/list');
    }
    public function catorgay_edit($id){
        try{
        $data=Category::where('id',$id)->first();
        return view('admin/category/edit',compact('data'));
    }catch(\Exception $i){
        return $i->getMessage();
    }
    }
    public function catorgay_update(Request $request,$id){
        $request->validate([
            'name' => 'required'
        ]);
        try{
            Category::where('id',$id)->update([
                'name'=>$request->get('name')
            ]);
            return redirect()->route('catorgay/list');
        }
        catch(\Exception $i){
            return $i->getMessage();
        }
    }
    public function catorgay_delete($id){
        try{
            Category::where('id',$id)->delete();
            return redirect()->back();
        }
        catch(\Exception $i){
            return $i->getMessage();
        }
    }
    public function categoryView($id){
        $data=Category::with('getSubCategory')->where('id',$id)->get();
        // echo "<pre>";
        // print_r($data);
        // die;
        return view('admin/category/relation',compact('data'));
    }
}