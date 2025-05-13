<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
class MainController extends Controller
{
    public function login(){
        return view('welcome');
    }

    public function register(){
        return view ('registration');
    }
    public function store_user(Request $request){
        $request -> validate([
            'user_name' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);

        User::create([
            'name' => $request->user_name,
            'email' => $request->email,
            'password' =>Hash::make($request->password),
        ]);
        return redirect()->back()->with('message','Account created !');
    }

    public function login_user(Request $request){

        $cridentials = $request->validate([
            'email'=>'required',
            'password'=> 'required'

        ]);

        if(Auth::attempt($cridentials)){
            return redirect()->route('home_page');
        }
        else{
          return redirect()->back()->with(
           'message','invalid login'
         );
        }
    }

    public function home_page(){
        return view('home_page');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
