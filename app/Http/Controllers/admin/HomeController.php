<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Mail\ContactMail;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    public function index()
    {
        try {
            return view('admin.dashboard');
        } catch (\Exception $e) {
            return "An unexpected error occurred.";
        }
    }

    public function logout()
    {
        try {
            Auth::guard("admin")->logout();
            return redirect()->route('admin.login');
        } catch (\Exception $e) {
            return redirect()->route('admin.login')->with('error', 'An unexpected error occurred.');
        }
    }

    public function aboutus()
    {
        return view('front.aboutus');
    }

    public function beforeafter()
    {
        return view('front.beforeafter');
    }

    public function contactus()
    {
        return view('front.contactus');
    }

    public function sendContactForm(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'message' => 'required|string',
        ]);
    
        $details = [
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message,
        ];
    
        try {
            Mail::to('su94-adcsm-f22-029@superior.edu.pk')->send(new ContactMail($details));
            return back()->with('success', 'Your message has been sent successfully!');
        } catch (\Exception $e) {
            return back()->with('error', 'Failed to send message. Error: ' . $e->getMessage());
        }
    }
    
}
