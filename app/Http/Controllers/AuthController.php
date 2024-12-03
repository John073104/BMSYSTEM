<?php
namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showRegisterForm()
    {
        return view('auth.register');
    }
// commit
public function register(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:8|confirmed',
    ]);

    // Create the user with hashed password
    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password), // Hash the password
    ]);

    // Optionally log in the user or redirect
    Auth::login($user);

    return redirect()->route('user.dashboard')->with('success', 'Registration successful!');
}

    public function showLoginForm()
    {
        return view('auth.login');
    }

    // commit

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);
    
        $user = User::where('email', $request->email)->first();
    
        if ($user && Hash::check($request->password, $user->password)) {
            Auth::login($user);
    
            // Redirect based on user role
            if ($user->role === 'admin') {
                return redirect()->route('admin.dashboard')->with('success', 'Admin login successful!');
            }
    
            return redirect()->route('user.dashboard')->with('success', 'Login successful!');
        }
    
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }
    public function logout()
    {
        Auth::logout();
        return redirect('/')->with('success', 'You have successfully logged out.');
    }
    
}
