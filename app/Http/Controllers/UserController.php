<?php

namespace App\Http\Controllers;

use App\Models\IdCard;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Config;

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
    }
    public function loginForm(){
        return view('users.login');
    }

    public function loggedin(Request $request){
        $loginFields = $request->validate([
            'email' => ['required','email'],
            'password' => 'required',
        ]);

        // Check if the admin user alredy inthe db or not
        $user=User::where('email',$loginFields['email'])->first();

        if($user->email==$loginFields['email'] && Hash::check($request->password,$user->password))
        {
            Auth::login($user);
            return redirect()->route('admin.index')->with('success','Admin logged in successfully');
        }
        else
        { 
            if($user){
                if(Hash::check($request->password, $user->password)){
                    if (Auth::attempt($loginFields)) {
                        if($user->role=='admin'){
                            return redirect()->route('admin.index');
                        }
                        else{
                            return redirect()->route('user.index');
                        }
                    }
                }
                else{
                    return back()->with('wrongPw',"Wrong user password... Try again.");
                }
            }
            else{
                return back()->with('noUser','No such account exists. Signup first...');
            }
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

        
        $validation['password']=bcrypt($validation['password']);
        
        $user=User::create($validation);

        Auth::login($user);

        return redirect()->route('user.index')->with('message','Successfuly logged in');


    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login.form')->with('message','Logged out successfully');

    }   
}
