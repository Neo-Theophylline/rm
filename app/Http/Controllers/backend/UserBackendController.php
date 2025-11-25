<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserBackendController extends Controller
{
    /**
     * Display all users.
     */
    public function index()
    {
        $users = User::all();
        return view('pages.backend.user.index', compact('users'));
    }

    /**
     * Show create user form.
     */
    public function create()
    {
        return view('pages.backend.user.create');
    }

    /**
     * Store new user.
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'role' => 'required|in:admin,superadmin,waiter',
            'status' => 'required|in:active,inactive',
        ]);

        // Upload image
        $imageName = null;
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('uploads/users'), $imageName);
        }

        User::create([
            'image' => $imageName,
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'status' => $request->status,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('user.index')->with('success', 'User created successfully');
    }

    /**
     * Show user detail.
     */
    public function show(User $user)
    {
        return view('pages.backend.user.show', compact('user'));
    }

    /**
     * Show edit form.
     */
    public function edit(User $user)
    {
        return view('pages.backend.user.edit', compact('user'));
    }

    /**
     * Update user.
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'image' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'role' => 'required|in:admin,superadmin,waiter',
            'status' => 'required|in:active,inactive',
            'password' => 'nullable|min:6',
        ]);

        $data = $request->only(['name', 'email', 'role', 'status']);

        // Update password optional
        if ($request->password) {
            $data['password'] = Hash::make($request->password);
        }

        // Upload image
        if ($request->hasFile('image')) {
            // delete old image
            if ($user->image && file_exists(public_path('uploads/users/' . $user->image))) {
                unlink(public_path('uploads/users/' . $user->image));
            }

            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('uploads/users'), $imageName);

            $data['image'] = $imageName;
        }

        $user->update($data);

        return redirect()->route('user.index')->with('success', 'User updated successfully');
    }

    /**
     * Delete user.
     */
    public function destroy(User $user)
    {
        // delete image
        if ($user->image && file_exists(public_path('uploads/users/' . $user->image))) {
            unlink(public_path('uploads/users/' . $user->image));
        }

        $user->delete();

        return redirect()->route('user.index')->with('success', 'User deleted successfully');
    }
}
