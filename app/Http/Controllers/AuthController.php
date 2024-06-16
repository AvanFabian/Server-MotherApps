<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    //Register user
    public function register(Request $request)
    {
        //validate fields
        $attrs = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed'
        ]);

        //create user
        $user = User::create([
            'name' => $attrs['name'],
            'email' => $attrs['email'],
            'password' => bcrypt($attrs['password'])
        ]);

        //return user & token in response
        return response([
            'user' => $user,
            'token' => $user->createToken('auth_token')->plainTextToken
        ], 200);
    }

    // login user
    public function login(Request $request)
    {
        //validate fields
        $attrs = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);

        $user = User::where('email', $attrs['email'])->first();

        if (!$user || !Hash::check($attrs['password'], $user->password)) {
            return response([
                'message' => 'Invalid credentials'
            ], 401);
        }

        $token = $user->createToken('auth_token')->plainTextToken;
        return response([
            'user' => $user,
            'token' => $token
        ], 200);
    }

    // logout user
    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response([
            'message' => 'Logout success.'
        ], 200);
    }

    // get single user details
    public function user()
    {
        return response([
            'user' => auth()->user()
        ], 200);
    }

    // get all users
    public function allUsers()
    {
        $users = User::all();
        return response(['users' => $users], 200);
    }

    // Update a specific user
    public function update(Request $request)
    {
        $user = auth()->user();

        $attrs = $request->validate([
            'name' => ['required', Rule::unique('users')->ignore($user->id)],
            'email' => ['required', 'email', Rule::unique('users')->ignore($user->id)],
            'email_confirmation' => 'required|same:email',
        ]);

        $user->name =  $attrs['name'];
        $user->email = $attrs['email'];

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('images');
            $user->image = $path;
        }
        /** @var \App\Models\User $user **/
        $user->save();

        return response()->json(['message' => 'User updated successfully', 'user' => $user], 200);
    }

    // Delete a specific user
    public function destroy(User $user)
    {
        $user->delete();

        return response()->json(['message' => 'User deleted successfully'], 200);
    }
}