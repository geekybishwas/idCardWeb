<?php

namespace App\Http\Controllers;


use App\Mail\Verification;
use App\Models\IdCard;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Mail;

use Illuminate\Support\Str;

class UserController extends Controller
{
    
    public function index(){
        // Checking if the user authenicate or not
        if(Auth::check()){
            $email=Auth::user()->email;
            // dd($email);

            // Cheking if the idcard exists from that email or not
            $users=IdCard::all();

            $idCardExist=false;

            foreach($users as $user){
                if($user->email==$email){
                    $idCardExist=true;
                    break;
                }
            }

            $idCard=IdCard::where('email',$email)->first();

            // dd($idCard);
            return view('users.index',compact('idCard','idCardExist'));
        }
        else{
            return back()->with('error','Login to proceed');
        }
    }
    public function loginForm(){
        return view('users.login');
    }

    public function loggedin(Request $request){
        $loginFields = $request->validate([
            'email' => ['required','email'],
            'password' => 'required',
        ]);

        // Check if the admin user alredy in the db or not
        $user = User::where('email', $loginFields['email'])->first();

        // Check if the user exists and the password matches
        if ($user && Hash::check($request->password, $user->password)) {
            // If the user is an admin
            if ($user->role == 'admin') {
                Auth::login($user);
                return redirect()->route('admin.index')->with('success', 'Admin logged in successfully');
            } else {
                // If the user is not an admin
                // Check if the email is verified
                if ($user->email_verified_at) {
                    // Attempt login
                    if (Auth::attempt($loginFields)) {
                        return redirect()->route('user.index');
                    }
                } else {
                    // Send verification email
                    try {
                        Mail::to($user->email)->send(new Verification($user));
                        // Email sent successfully
                        return view('users.success')->with('message', 'Registration successful! Please check your email for the verification link.');
                    } catch (\Exception $e) {
                        // Log or handle the error
                        logger()->error('Error sending email: ' . $e->getMessage());
                        return back()->with('error', 'Failed to send verification email. Please try again later.');
                    }
                }
            }
        } else {
            // If password doesn't match
            return back()->with('message', "Wrong email or password... Try again.");
        }

    }
        
    public function registerForm(){
    return view('users.register');
    }

    public function register(Request $request){
        // dd($request->all());
        $validation=$request->validate([
            'username'=>['required','min:6', Rule::unique('users','username')],
            'email'=>['required','email', Rule::unique('users','email')],
            'password'=>'required',
        ]);

        
        $validation['password']=Hash::make($validation['password']);
        $validation['token']=Str::random(64);
        
        $user=User::create($validation);

        // dd($user);

        try {
            Mail::to($validation['email'])->send(new Verification(($user)));
            // Email sent successfully
        } catch (\Exception $e) {
            // Log or handle the error
            logger()->error('Error sending email: ' . $e->getMessage());
        }

        return view('users.success')->with('message','Registration successful! Please check your email for the verification link.');

    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');

    }
    public function emailVerify($token){
        // dd($token);
        $user=User::where('token',$token)->first();
        // dd($user);
        if ($user) {
            // Update the user when email verified 
            $user->email_verified_at = now();
            $user->save();
        }

        // dd($user);
        Auth::login($user);
        return redirect()->route('user.index')->with('message',"Successfully loggedin");


    }   
}
