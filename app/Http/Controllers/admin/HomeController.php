<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(){
        try {

            return view('admin.dashboard');
            // $admin = Auth::guard("admin")->user();
            // return "Welcome " . $admin->name . '<a href="' . route('admin.logout') . '">Logout</a>';
        } catch (\Exception $e) {
            // Handle any unexpected exceptions here
            return "An unexpected error occurred.";
        }
    }

    public function logout(){
        try {
            Auth::guard("admin")->logout();
            return redirect()->route('admin.login');
        } catch (\Exception $e) {
            // Handle any unexpected exceptions here
            return redirect()->route('admin.login')->with('error', 'An unexpected error occurred.');
        }
    }
}
