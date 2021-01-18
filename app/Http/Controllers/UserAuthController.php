<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserAuthController extends Controller
{
    function login(){
        return view('auth.login');
    }
    function register(){
        return view('auth.register');
    }
    function create(Request $request){
        //validate requests
        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:5|max:12'
        ]);
        //if form is validated, register new user
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $query = $user->save();

        if($query){
            return back()-> with('success', 'You have been successfully registered');
        }else{
            return back()-> with('fail', 'Something went wrong');
        }
    }
    function check(Request $request){
        //validate requests
        $request->validate([
            'email'=>'required|email',
            'password'=>'required|min:5|max:12'
        ]);
        //if form is validated, login the user
        $user = User::where('email', '=', $request->email)->first();
        if($user){
            if(Hash::check($request->password, $user->password)){
                //if password matches then redirect to user profile
                $request->session()->put('LoggedUser', $user->id);
                return redirect('profile');
            }else{
                return back()-> with('fail', 'Wrong password');
            }
        }else{
            return back()->with('fail', 'No account found for this email');
        }
    }
    function profile(){
        if(session()->has('LoggedUser')){
            $user = User::where('id', '=', session('LoggedUser'))->first();
            $data = [
                'LoggedUserInfo'=>$user
            ];
        }
        return view('admin.profile', $data);     
    }
    function logout(){
        if(session()->has('LoggedUser'))
        session()->pull('LoggedUser');
        return redirect('login');
    }
}
