<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// use App\Models\Events;

class Pricing extends Controller
{
    public function pricing(){
        // $user=Events::select('*')->get();
        return view('frontend/pricing');
    }
}
