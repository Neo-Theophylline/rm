<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserBackendController extends Controller
{
    public function index()
    {
        $users = User::orderBy('created_at', 'desc')->paginate(10);
        return view('pages.backend.user.index', compact('users'));
    }

    public function create()
    {
        return view('pages.backend.user.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'nullable|image|mimes:jpg,png,jpeg',
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'role' => 'required|in:admin,superadmin,waiter',
            'status' => 'required|in:active,inactive',
        ]);

        // === UPLOAD IMAGE MENGGUNAKAN STORAGE LINK ===
        $imageName = null;
        if ($request->hasFile('image')) {
            $imageName = $request->file('image')->store('users', 'public');
            // hasil nya: "users/namafile.jpg"
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

    public function show(User $user)
    {
        return view('pages.backend.user.show', compact('user'));
    }

    public function edit(User $user)
    {
        return view('pages.backend.user.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'image' => 'nullable|image|mimes:jpg,png,jpeg',
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'role' => 'required|in:admin,superadmin,waiter',
            'status' => 'required|in:active,inactive',
            'password' => 'nullable|min:6',
        ]);

        $data = $request->only(['name', 'email', 'role', 'status']);

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        // === IMAGE UPDATE (AMAN) ===
        if ($request->hasFile('image')) {

            // hapus image lama
            if ($user->image && Storage::disk('public')->exists($user->image)) {
                Storage::disk('public')->delete($user->image);
            }

            // simpan image baru
            $data['image'] = $request->file('image')->store('users', 'public');
        }

        $user->update($data);

        return redirect()->route('user.index')->with('success', 'User updated successfully');
    }

    public function destroy(User $user)
    {
        if ($user->image && Storage::disk('public')->exists($user->image)) {
            Storage::disk('public')->delete($user->image);
        }

        $user->delete();

        return redirect()->route('user.index')->with('success', 'User deleted successfully');
    }
}
