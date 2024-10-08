<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User;
use Illuminate\Validation\Rule as ValidationRule;
use TijsVerkoyen\CssToInlineStyles\Css\Rule\Rule;

class UserController extends Controller
{
    //Show Register/create form
    public function create(){
        return view('users.register');
    }

    //Create New User
    public function store(Request $request) {
        // dd($request);

        
        $formFields = $request->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email','unique:users'], 
            'password' => 'required|confirmed|min:6'
        ]);

        // dd($request);


        // Hash Password
        $formFields['password'] = bcrypt($formFields['password']);

        // Create User
        $user = User::create($formFields);

        // Login
        auth()->login($user);

        return redirect('/')->with('message', 'User created and logged in');
    }

        // Logout User
        public function logout(Request $request) {
            auth()->logout();
    
            $request->session()->invalidate();
            $request->session()->regenerateToken();
    
            return redirect('/')->with('message', 'You have been logged out!');
    
        }


    // Show Login Form
    public function login() {
        return view('users.login');
    }

        // Authenticate User
        
public function authenticate(Request $request) {
            $formFields = $request->validate([
                'email' => ['required', 'email'],
                'password' => 'required'
            ]);
    
            if(auth()->attempt($formFields)) {
                $request->session()->regenerate();
    
                return redirect('/')->with('message', 'You are now logged in!');
            }
    
            return back()->withErrors(['email' => 'Invalid Credentials'])->onlyInput('email');
        } 
}
