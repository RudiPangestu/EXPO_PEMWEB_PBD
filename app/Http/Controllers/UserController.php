<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use App\Models\User;

class UserController extends Controller
{
    public function loginForm()
    {
        return view('user.login');
    }

    public function landing()
    {
        return view('user.landingpage');
    }
    public function profile()
    {
        return view('user.profile');
    }

    public function signupForm()
    {
        return view('user.signup');
    }

    public function signupData(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'username' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
            'phone' => 'required|string|max:15',
            'address' => 'required|string|max:255',
        ]);

        // Create a new user and save it to the database
        $data =[
            'username' => $request->input('username'),
            'email' => $request->input('email'),
            'password' => $request->input('password'),
            'phone' => $request->input('phone'),
            'address' => $request->input('address'),
            'createdAt' => base64_encode(now()->toDateTimeString())
        ];

        try {
            // Send the signup data to the external API
            $response = Http::post('http://localhost:8069/users', $data);

            if ($response->successful()) {
                // Assuming the API returns user data and a token or session info
                $userData = $response->json();

                // Optionally, store the user info in the session
                dd(session(['user' => $userData]));

                // Log the user in by saving the session or token
                Auth::loginUsingId($userData['data']['id']);

                return redirect()->route('user.propfile')->with('success', 'Account created successfully.');
            } else {
                return back()->withErrors(['email' => 'Signup failed: ' . $response->json()['error']])->withInput();
            }
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'An unexpected error occurred: ' . $e->getMessage()])->withInput();
        }
    }

    public function loginData(Request $request)
    {
        $data = $request->only('email', 'password');

        try {
            // Send the login request to the external API
            $response = Http::post('http://localhost:8069/auth/login', $data);

            // Check the response body
            // dd($response->body());

            if ($response->successful()) {
                $userData = $response->json();
                // dd($userData);  // Check the content of the response
                
                if (isset($userData['data'])) {
                    session(['user' => $userData['data']]);
                    Auth::loginUsingId($userData['data']['id']);
                    return redirect()->route('profile.show')->with('success', 'Logged in successfully.');
                }
            } else {
                dd($response->json()); // Check the response error
                return back()->withErrors(['error' => 'Invalid credentials']);
            }
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'An unexpected error occurred: ' . $e->getMessage()])->withInput();
        }
    }



}
