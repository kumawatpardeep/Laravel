<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Events;

class Event extends Controller
{
   public function event(){
    $user=Events::select('*')->get();
    return view('frontend/event',compact('user'));
   }
}
