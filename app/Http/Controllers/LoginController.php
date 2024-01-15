<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request; // Import the Request class

use App\Models\User; // Import the User model

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {   $credentials = $request->only('email', 'password');
        $user = User::where('email', $request->input('email'))->orWhere('unique_name', $request->input('email'))->first();
    
        $uniqueNameCredentials = [
            'unique_name' => $user ? $user->unique_name : null,
            'password' => $request->input('password')
        ];
    
        if ($user && (Auth::attempt($credentials) || Auth::attempt($uniqueNameCredentials))) {
            // Authentication passed, redirect to the home page
            return redirect()->route('home'); // Assuming 'home' is the name of your home page route
        }
    
        // Authentication failed, redirect back with input data
        return redirect()->back()->withInput($request->only('email'))->withErrors([
            'email' => 'These credentials do not match our records.',
        ]);
    }
}

