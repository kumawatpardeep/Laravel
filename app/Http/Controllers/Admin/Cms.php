<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cmss;

class Cms extends Controller
{
  public function add()
  {
    return view('admin/cms/add');
  }
  public function insertadd(Request $request)
  {
    $request->validate([
      'title' => 'required',
      'description' => 'required'
    ]);

    $cmsdata = new Cmss;
    $cmsdata->title = $request->get('title');
    $cmsdata->description = $request->get('description');

    $cmsdata->save();
    return redirect()->route('admin/cms/list');
  }
  public function status($id)
  {
    $product = Cmss::select('status')->where('id', $id)->first();

    if ($product->status == '1') {
      $status = '0';
    } else {
      $status = '1';
    }

    $values = array('status' => $status);
    Cmss::where('id', $id)->update($values);
    return redirect()->route('admin/cms/list');
  }
  public function list()
  {
    // $data=Cms::all();
    $data = Cmss::select('*')->get();
    return view('admin/cms/list', compact('data'));
  }
  public function delete($id){
    Cmss::where('id',$id)->delete();
    return redirect()->back();
  }
}