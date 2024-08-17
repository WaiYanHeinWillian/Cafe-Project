<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AuthController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }

    public function store()
    {   
        
        $formData=request()->validate([
            'name'=>'required|max:255',
            'username'=>['required','max:255',Rule::unique('users','username')],
            'email'=>['required','email',Rule::unique('users','email')],
            'password'=>'required',
        ]);

        $user=User::create($formData);
        // session()->flash('success','Welcome Dear, '.$user->name);
        auth()->login($user);
        return redirect('/')->with('success','Welcome Dear, '.$user->name);
    }

    public function login(){
        return view('auth.login');
    }

    public function post_login()
    {
        $formData=request()->validate([
            'email'=>['required','max:255','email',Rule::exists('users','email'),],
            'password'=>['required','min:4','max:255']
        ],[
            'email.required'=>"Email shouldn't be empty",
            'password.required'=>"Password must be filled"
        ]);

        if(auth()->attempt($formData))
        {
            if(auth()->user()->is_admin)
            {
                return redirect('/admin/menus')->with('success',"Hello Admin!");
            }else{
                return redirect('/')->with('success',"Welcome Back!");
            }
            
        }else{
            return redirect()->back()->withErrors([
                'email'=>"Credential is wrong!"
            ]);
        }
    }

    public function logout()
    {
        auth()->logout();
        return redirect('/')->with('success',"GoodBye!!");
    }


}
