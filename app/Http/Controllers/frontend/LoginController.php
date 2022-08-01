<?php

namespace App\Http\Controllers\frontend;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(){
        return view('frontend.pages.login');
    }

    public function signup(){
        return view('frontend.pages.register');
    }

    public function usersignup(Request $request){
        $this->validate($request, [
            'email'=>'required|max:50|unique:users,email',
        ]);
        // dd($request->all());
        User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>bcrypt($request->password) ,
            'phone'=>($request->phone) ,
            'address'=>($request->address) ,
        ]);


        return redirect()->route('login')->with('message','Registration Succesfull ! Now Login.');
    }



    public function userlogin(Request $request){
        // dd($request->all());
        $userpost = $request->except('_token');
        // dd($userpost);
        //  dd(Auth::attempt($userpost));
        if (Auth::attempt($userpost)) {
            return redirect()->route('website.check.banned');
        }
        else
        return redirect()->route('login')->with('error', 'Invalid username or password');

    }



    public function checkBanned()
    {
        if(auth()->user()->status != 'active'){
            Auth::logout();
            return redirect()->route('login')->with('error', 'You Cannot Access Here.. Because You are Banned Customer.');
        }else{
            return redirect()->route('home')->with('message', 'Login Successful');
        }
    }

    public function userlogout(){
        Auth::logout();
        return redirect()->route('home')->with('message','Logged Out Thank You ');
    }
}
