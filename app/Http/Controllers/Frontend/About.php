<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Events;
use App\Models\Trainers;

class About extends Controller
{
    public function about(){
        $user=Events::select('*')->get();
        $users=Trainers::select('*')->get();

        return view('frontend/about',compact('user','users'));
    }
}
