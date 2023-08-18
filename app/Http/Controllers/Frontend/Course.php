<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Courses;

class Course extends Controller
{
   public function courses(){
    $user=Courses::select('*')->get();
    return view('frontend/courses',compact('user'));
   }
}
