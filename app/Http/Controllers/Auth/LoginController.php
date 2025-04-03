<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/dashboard'; // Redirect to dashboard by default

    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        // Ensure only guests can access the login page, except for logout
        $this->middleware('guest')->except('logout');
    }

    /**
     * Redirect the user after successful authentication.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function authenticated(Request $request, $user)
    {
        // Redirect the user to the dashboard
        return redirect()->route('dashboard');
    }

    /**
     * Get the login credentials from the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    protected function credentials(Request $request)
    {
        // Validate login with EmployeeNumber and password
        return [
            'EmployeeNumber' => $request->get('EmployeeNumber'), // Matches form input
            'password' => $request->get('password'),
        ];
    }

    /**
     * Handle failed login attempts.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function sendFailedLoginResponse(Request $request)
    {
        // Return with a custom error message
        return redirect()->back()
            ->withInput($request->only('EmployeeNumber', 'password'))
            ->with('error', 'Invalid Employee Number or password.');
    }

    /**
     * Validate the login request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return void
     */
    protected function validateLogin(Request $request)
    {
        // Ensure EmployeeNumber and password fields are provided
        $request->validate([
            'EmployeeNumber' => 'required|string',
            'password' => 'required|string',
        ]);
    }

    /**
     * Log the user out and redirect to login page.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout(Request $request)
    {
        Auth::logout(); // Log the user out
        $request->session()->invalidate(); // Invalidate session
        $request->session()->regenerateToken(); // Regenerate CSRF token
        return redirect()->route('login')->with('success', 'You have been logged out successfully.');
    }
}
