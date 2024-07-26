<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthenticatedSessionController extends Controller
{
    // Display the login form
    public function create()
    {
        return view('auth.login'); // Make sure this view exists
    }

    // Handle the login form submission
    public function store(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication passed
            return redirect()->intended('dashboard');
        }

        // Authentication failed
        throw ValidationException::withMessages([
            'email' => __('auth.failed'),
        ]);
    }
}
