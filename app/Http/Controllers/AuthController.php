<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Authentication;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(Request $request){
        $fields = $request->validate([
            "username" => ['required','string'],
            "email"=>['required','unique:authentications'],
            "password"=>['required','confirmed'],
            "role"=>['required','string'],
        ]);

        $auth = Authentication::create($fields);
        $users = User::create($fields);
        // dd($fields);

        //authenticate the user
        Auth::login($users);

        //redirect to login page
        return redirect('login')->with('success','User Data Created Successfully');
    }

    public function login(Request $request){
        $fields = $request->validate([
            // "username"=>['required','string'],
            "email"=>['required','max:225','email'],
            "password"=>["required"],
            "role"=>['required','string'],
        ]);
        // $teacher = $request->request([
        //     "role"=>'teacher',
        // ]);
        // $student = $request->request([
        //     "role"=>'student',
        // ]);
        // dd($fields,$roles);

        if(Auth::attempt($fields)){
            if(Auth::user()->role == 'teacher'){
                return redirect('dashboard')->with('success','You have been Successfully Logged in as Teacher!');
            }elseif(Auth::user()->role == 'student'){
                return redirect('student')->with('success','You have been Successfully Logged in as Student!');
            }
        }else{
            return redirect('login')->with('error','Invalid Credentials');
        }
    }

    public function logout(Request $request){
        Auth::logout();

        //after logging out we have to invalidate the session to the user
        $request->session()->invalidate();

        //regenerate csrf token
        $request->session()->regenerateToken();

        return redirect('login')->with('success','You have been Successfully Logged out!');
    }
}
