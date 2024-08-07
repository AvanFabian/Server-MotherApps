<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

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
        $user = Auth::user();
    
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'email_confirmation' => 'required|same:email',
            'image' => 'nullable|string'
        ]);
    
        $image = $this->saveImage($request->image, 'users');
        Log::info($image);
        
        $user->name = $request->name;
        $user->email = $request->email;
        $user->image = $image;
        /** @var \App\Models\User $user **/
        $user->save();
        // if ($request->has('image')) {
        //     $imageData = $request->input('image');
        //     $fileName = time() . '.png';
    
        //     // Decode the base64 string back to an image and store it
        //     Storage::disk('public')->put($fileName, base64_decode($imageData));
    
        //     $user->image = $fileName;
        // }
    
        // $user->name = $request->input('name');
        // $user->email = $request->input('email');
        // /** @var \App\Models\User $user **/
        // $user->save();
    
        return response()->json([
            'status' => 'success',
            'message' => 'User updated successfully',
            'user' => $user
        ]);
    }
    // Delete a specific user
    public function destroy(User $user)
    {
        $user->delete();

        return response()->json(['message' => 'User deleted successfully'], 200);
    }
}