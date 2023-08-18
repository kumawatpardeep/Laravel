<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class RegisterController extends Controller
{
   public function registers(){
    return view('admin/register');
   }
   public function register(Request $request)
   {
       $request->validate([
           'name' => 'required|string',
           'email' => 'required|string|email|unique:users',
           'password' => 'required|string|min:8',
       ]);
   
       $user = User::create([
           'name' => $request->name,
           'email' => $request->email,
           'password' => Hash::make($request->password),
       ]);
       
       auth()->login($user);
   
       // You can perform additional actions after successful registration,
       // such as sending a welcome email or redirecting the user to a specific page.
   
       return redirect('admin/login'); // Redirect the user to the desired page after registration.
   }
}
