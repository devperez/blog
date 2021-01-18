<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserAuth extends Controller
{
    function login() {
        return view('auth.login');
    }
    function register(){
        return view('auth.register');
    }

    function create(Request $request){
        //request validation
        $request->validate([
            'name'=>'required',
            'email'=> 'required|email|unique:users',
            'password'=>'required|min:5|max:12'
        ]);
        //store new user into database
            $user = new User;
            $user -> password = $request->password;
            $user -> email = $request->email;
            $query = $user->save();

            if($query){
                return back()->with('success', 'You have been successfuly registered');
            }else{
                return back()->with('fail', 'Something went wrong');
            }
    }
}
