<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Support\Facades\DB;

class SubCategorys extends Controller
{
    public function getAllData(){
        try{
            $data=Category::get();
            return view('admin/subcategory/add',compact('data',));
        }catch(\Exception $i){
            return $i->getMessage();
        }
    }
    public function store(Request $request){
        $request->validate([
            'name'=>'required'
        ]);
try{
        $data = new SubCategory;
        $data->categorie_id=$request->get('category_id');
        $data->name = $request->get('name');
        $data->save();
        // return response()->json(['message' => 'data inserted successfully']);
        return redirect()->route('subCategory/list');        
        
    }catch(\Exception $i){
        return $i->getMessage();
    }
    

    }
    public function Category_status($id){
        
        $cotegray=SubCategory::select('status')->where('id',$id)->first();
        if($cotegray->status=='1'){
            $status='0';
        }
        else{
            $status='1';
        }
        $values=array('status'=>$status);
        SubCategory::where('id',$id)->update($values);
        return redirect()->route('subCategory/list');
    }
    public function subCategoryDataGet(){
        // try{
        //     $user=SubCategory::select('sub_categories.*','categories.name as names')
        //     ->join('categories','sub_categories.categorie_id','=','categories.id')
        //     ->get();
        //     // $user=SubCategory::get();
        // }catch(\Exception $i){
        //     return $i->getMessage();
        // }
    $user=SubCategory::with('getCategory')->get();
    // echo "<pre>";
    //     print_r($user);
    //     die;
            return view('admin/subcategory/list',compact('user'));


    }
    public function subCategory_edit($id){
        try{
            $data=SubCategory::where('id',$id)->first();
            return view('admin/subcategory/edit',compact('data'));
        }catch(\Exception $i){
            return $i->getMessage();
        }
    }
    public function subCategory_update(Request $request,$id){
        try{
           SubCategory::where('id',$id)->update([
            'name'=>$request->get('name')

           ]);
           return redirect()->route('subCategory/list');
        }catch(\Exception $i){
            return $i->getMessage();
        }
    }
    public function delete($id){
        try{
            SubCategory::where('id',$id)->delete();
            return redirect()->back();
        }catch(\Exception $i){
            return $i->getMessage();
        }
    }
}
