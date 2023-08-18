<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cmss;
use App\Models\Events;
use App\Models\Courses;

class Index extends Controller
{
    public function index(){
        $user=Cmss::select('*')->get();
        $data=Events::select('*')->get();
        $courses=Courses::select('*')->get();
        return view('frontend/include/index',compact('user','data','courses'));
    }
}
