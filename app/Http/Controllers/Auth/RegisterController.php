<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Employee; // Ensure Employee model is imported
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /**
     * Show the registration form.
     */
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    /**
     * Handle the registration of a new user.
     */
    public function register(Request $request)
    {
        // Validate the request data
        $this->validator($request->all())->validate();

        // Create the new user
        $user = $this->create($request->all());

        // Log in the newly registered user
        auth()->login($user);

        // Redirect to the Employee Dashboard
        return redirect()->route('employee.dashboard')->with('success', 'Registration successful! Welcome to your dashboard.');
    }

    /**
     * Validate the registration data.
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'EmployeeNumber' => [
                'required',
                'string',
                'max:255',
                'unique:users', // Ensure EmployeeNumber is unique in the users table
                function ($attribute, $value, $fail) {
                    if (!Employee::where('EmployeeNumber', $value)->exists()) {
                        $fail('The selected Employee Number does not exist in our records.');
                    }
                },
            ],
            'email' => ['nullable', 'string', 'email', 'max:255', 'unique:users'], // Make email optional
            'password' => ['required', 'string', 'min:8', 'confirmed'], // Enforce password rules
        ]);
    }

    /**
     * Create a new user instance after validation.
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'EmployeeNumber' => $data['EmployeeNumber'], // Save EmployeeNumber
            'email' => $data['email'] ?? null, // Optional email
            'password' => Hash::make($data['password']),
            'role' => 'employee', // Automatically assign employee role
        ]);
    }
}
