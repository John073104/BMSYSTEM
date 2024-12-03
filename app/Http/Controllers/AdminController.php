<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin; // Assuming you have an Admin model

class AdminController extends Controller
{
    // Show the admin login form
    public function showLoginForm()
    {
        return view('admin.login'); // Return the login view
    }

    // Handle the admin login submission
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::guard('admin')->attempt($credentials)) {
            // Authentication passed
            return redirect()->intended('/admin/dashboard'); // Redirect to admin dashboard
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    // Show the form for creating a new admin
    public function showCreateForm()
    {
        return view('admin.create'); // Return the create admin view
    }

    // Handle the creation of a new admin
    public function create(Request $request)
    {
        // Check the number of existing admins
        $adminCount = Admin::count();
        
        if ($adminCount >= 2) {
            return back()->withErrors([
                'admin_limit' => 'The maximum number of admins has been reached. You cannot create more than 2 admins.',
            ]);
        }
    
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:admins',
            'password' => 'required|string|min:8|confirmed',
        ]);
    
        // Create a new admin
        Admin::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']), // Hash the password
        ]);
    
        return redirect()->route('admin.login')->with('success', 'Admin created successfully. You can now log in.');
    }
    // public function dashboard()
    // {
    //     // Return a view for the admin dashboard
    //     return view('admin.dashboard'); // Ensure this view exists
    // }
    public function dashboard() {
      return view('admin.dashboard');
  }
  
  public function barangayOfficials() {
      return view('admin.barangay_officials');
  }
  
  public function residentProfiling() {
      return view('admin.resident_profiling');
  }
  
  public function healthSanitation() {
      return view('admin.health_sanitation');
  }
  
  public function clearancesForms() {
      return view('admin.clearances_forms');
  }
  
  public function report() {
      return view('admin.report');
  }
}