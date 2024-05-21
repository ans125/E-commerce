<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login(){
        try {
            return view("front.account.login");
        } catch (\Exception $e) {
            // Handle the exception and redirect back with an error message
            session()->flash('error', 'An error occurred while processing your request.');
            return redirect()->route('front.home');
        }
    }

    public function register(){
        try {
            return view("front.account.register");
        } catch (\Exception $e) {
            // Handle the exception and redirect back with an error message
            session()->flash('error', 'An error occurred while processing your request.');
            return redirect()->route('front.home');
        }
    }

    public function processRegister(Request $request){
        try {
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'email' => 'required|email|unique:users',
                'password' => 'required'
            ]);

            if ($validator->passes()) {
                $user = new User;
                $user->name = $request->name;
                $user->email = $request->email;
                $user->password = Hash::make($request->password);
                $user->save();
                session()->flash('success','You have been registered successfully.');

                // Add code to handle successful validation here
                return response()->json([
                    'status' => true,
                ]);
            } else {
                return response()->json([
                    'status' => false,
                    'errors' => $validator->errors()
                ]);
            }
        } catch (\Exception $e) {
            // Handle the exception and return error response
            return response()->json([
                'status' => false,
                'message' => 'An error occurred while processing your registration.'
            ]);
        }
    }

    public function authenticate(Request $request){
        try {
            $validator = Validator::make($request->all(), [
                'email' => 'required|email',
                'password' => 'required',
            ]);

            if ($validator->passes()) {
                if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {
                    
                    if(session()->has('url.intended')){
                        return redirect(session()->get('url.intended'));
                    }
                    // Authenticated successfully, you might want to add some code here
                } else {
                    return redirect()->route('account.login')
                    ->withInput($request->only('email'))
                    ->with('error', ' Either email/password is incorrect.');
                }
            } else {
                return redirect()->route('account.login')
                    ->withErrors($validator)
                    ->withInput($request->only('email'));
            }
        } catch (\Exception $e) {
            // Handle the exception and redirect back with an error message
            return redirect()->route('account.login')
                ->with('error', 'An error occurred while processing your login.');
        }
    }
    
    public function profile(){
        try {
            return view('front.account.profile');
        } catch (\Exception $e) {
            // Handle the exception and redirect back with an error message
            session()->flash('error', 'An error occurred while processing your request.');
            return redirect()->route('front.home');
        }
    }

    public function logout(Request $request){
        try {
            Auth::logout();
            return redirect()->route('account.login')
                ->with('success','You have successfully logged out!');
        } catch (\Exception $e) {
            // Handle the exception and redirect back with an error message
            session()->flash('error', 'An error occurred while processing your request.');
            return redirect()->route('front.home');
        }
    }
}
