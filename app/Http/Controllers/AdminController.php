<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $id_card_details=
        // Assgning this two fields empty at first,coz at first there is no idCards and search input
        $search="";
        $idCards=[];
        return view('admin.dashboard',compact('search','idCards'));
    }

    public function loginForm(){
        return view('admin.login');
    }

    public function loggedin(Request $request){
        $loginFields = $request->validate([
            'email' => ['required','email'],
            'password' => 'required',
        ]);

        $admin = User::where('email','=',$request->email)->first();
        if($admin){
            if(Hash::check($request->password, $admin->password)){
                if (Auth::attempt($loginFields)) {
                    return redirect()->intended('/');
                }
            }
            else{
                return back()->with('wrongPw',"Wrong admin password... Try again.");
            }
        }
        else{
            return back()->with('noUser','No such account exists. Signup first...');
        }
    }

    public function registerForm(){
        return view('admin.register');
    }

    public function register(Request $request){
        // dd($request->all());
        $validation=$request->validate([
            'username'=>['required','min:6', Rule::unique('users','username')],
            'email'=>['required','email', Rule::unique('users','email')],
            'password'=>'required',
            // Default admin role when register
            'role'=>'admin'
        ]);

        $validation['password']=bcrypt($validation['password']);

        // Add users
        $user=User::create($validation);

        Auth::login($user);

        return redirect()->route('admin.index')->with('message','Successfuly logged in');


    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('admin.dashboard')->with('message','Logged out successfully');

    }   

}
