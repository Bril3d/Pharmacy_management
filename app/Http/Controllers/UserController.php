<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        // Get all users
        $users = User::all();
        return view('users.index', compact('users'));
    }

    public function create()
    {
        // Show the user creation form
        return view('users.create');
    }

    public function store(Request $request)
    {
        // Validate and store a new user
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|in:user,admin',  // Validate role
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => $request->role, // Store role
        ]);

        return redirect()->route('users.index')->with('success', 'User created successfully.');
    }

    public function show(User $user)
    {
        // Show a single user's details
        return view('users.show', compact('user'));
    }

    public function edit(User $user)
    {
        // Show the user edit form
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        // Validate and update the user
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8|confirmed',
            'role' => 'required|in:user,admin',  // Validate role
        ]);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,  // Update role
            'password' => $request->password ? bcrypt($request->password) : $user->password, // Update password if provided
        ]);

        return redirect()->route('users.index')->with('success', 'User updated successfully.');
    }

    public function destroy(User $user)
    {
        // Delete the user
        $user->delete();
        return redirect()->route('users.index')->with('success', 'User deleted successfully.');
    }
}
