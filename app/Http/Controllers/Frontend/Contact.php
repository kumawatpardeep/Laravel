<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contacts;

class Contact extends Controller
{
    public function contact(){
        
        return view('frontend/contact');
    }
    public function contactInsert(Request $request){
        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:contacts,email',
            'subject'=>'required',
            'message'=>'required'
        ]);
        $dataInsert=new Contacts;
        $dataInsert->name=$request->get('name');
        $dataInsert->email=$request->get('email');
        $dataInsert->subject=$request->get('subject');
        $dataInsert->message=$request->get('message');

        $dataInsert->save();
        // session()->flash('success'=>'Message Successfully Send');
        return redirect()->back()->with(['success'=>'Message Successfully Send','success_expires_at' => now()->addMinutes(1)]);

    }
}
