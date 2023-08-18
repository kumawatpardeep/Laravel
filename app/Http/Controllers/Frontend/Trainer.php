<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Trainers;

class Trainer extends Controller
{
   public function trainer(){
    $user=Trainers::select('*')->get();
    return view('frontend/trainer',compact('user'));
   }
}
