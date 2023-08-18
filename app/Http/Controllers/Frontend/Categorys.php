<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class Categorys extends Controller
{
    public function category(){
        $ssssss=Category::get();
        return view('frontend/include/header',compact('ssssss'));
    }
}
