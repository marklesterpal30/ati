<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\VerifyMail;


class AuthController extends Controller
{
    public function showlogin(){
        return view('auth.login');
    }   

    public function login(Request $request)
    {
        // Attempt to authenticate the user
        $credentials = $request->only('email', 'password');
    
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
    
            // Check if the user's email is verified
            if (is_null($user->email_verified_at)) {
                // Redirect the user if their email is not verified
                Auth::logout(); // Log them out immediately
                return redirect('/login')->withErrors(['email' => 'Please verify your email before logging in.']);
            }
    
            // Redirect based on user role
            if ($user->role == 'user') {
                return redirect()->intended('/user-dashboard');
            } elseif ($user->role == 'admin' || $user->role == 'superadmin') {
                return redirect()->intended('/admin-dashboard');
            } else {
                return redirect()->intended('/office-dashboard');
            }
        }
    
        return redirect('/login')->withErrors(['credentials' => 'Invalid email or password.']);
    }
    
    public function signupForm(){
        return view('auth.signup');
    }

    public function signup(Request $request){
        $input = $request->all();

        User::create($input);

        $recipient = $request->input('email');

        $message = "Plese Verify Your Account";
        $request->session()->flash('email', $recipient);


        // Mail::to($recipient)->send(new VerifyMail($message));


        return redirect('/login');
    }

    public function verify($email){
        $user = User::where('email', $email);
        $user->update([
        'email_verified_at' => now(),
        ]);

        return redirect('/login');
    }

    public function logout(){
        Auth::logout();
        return redirect('/login');
    }

}
