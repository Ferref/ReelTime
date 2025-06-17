<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{
    public function store(Request $request) {
        try {
            $validated = $request->validate([
                'username' => 'required|string|max:100|unique:users,username',
                'email'    => 'required|string|email|max:255|unique:users,email',
                'password' => [
                    'required',
                    'string',
                    'min:8',
                    'regex:/[A-Z]/',
                    'regex:/[0-9]/',
                    'confirmed',
                ],
            ]);

        User::create([
            'username' => $validated['username'],
            'email'    => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        return response()->json([
            'message' => 'success',
            'redirect' => '/home'
        ], 200);

        } catch (ValidationException $e) {
            return response()->json([
                'message' => 'Validation failed',
                'errors' => $e->errors(),
            ], 422);
        }
    }


    public function login(Request $request)

    {
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);


        if (Auth::attempt([
            'username' => $credentials['username'],
            'password' => $credentials['password']
        ])) {
            $request->session()->regenerate();

            return response()->json([
                'message' => 'success',
                'redirect' => '/home'
            ], 200);
        }

        return response()->json([
            'message' => 'Invalid credentials',
            'errors' => 'Invalid username or password'
        ], 422);

    }
}
