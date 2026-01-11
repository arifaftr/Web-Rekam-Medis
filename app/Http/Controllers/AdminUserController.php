<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminUserController extends Controller
{
    /**
     * Show list of all users
     */
    public function index()
    {
        $users = User::with('roles')->paginate(10);
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new user
     */
    public function create()
    {
        return view('auth.register-admin');
    }

    /**
     * Store a newly created user in database
     */
    public function store(Request $request)
    {
        // Check if user is superadmin
        if (!auth()->user()->hasRole('superadmin')) {
            abort(403, 'Hanya superadmin yang dapat membuat user baru');
        }

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        // Assign the default role 'user'
        $user->assignRole('user');

        return redirect()->route('users.index')
            ->with('success', 'User berhasil dibuat');
    }

    /**
     * Show the form for editing a user
     */
    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified user in database
     */
    public function update(Request $request, User $user)
    {
        // Check if user is superadmin
        if (!auth()->user()->hasRole('superadmin')) {
            abort(403, 'Hanya superadmin yang dapat mengedit user');
        }

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        $user->name = $validated['name'];
        $user->email = $validated['email'];

        if ($request->filled('password')) {
            $user->password = Hash::make($validated['password']);
        }

        $user->save();

        return redirect()->route('users.index')
            ->with('success', 'User berhasil diperbarui');
    }

    /**
     * Delete the specified user from database
     */
    public function destroy(User $user)
    {
        // Check if user is superadmin
        if (!auth()->user()->hasRole('superadmin')) {
            abort(403, 'Hanya superadmin yang dapat menghapus user');
        }

        // Prevent deleting current logged-in user
        if (auth()->user()->id === $user->id) {
            return redirect()->route('users.index')
                ->with('error', 'Anda tidak dapat menghapus akun Anda sendiri');
        }

        $user->delete();

        return redirect()->route('users.index')
            ->with('success', 'User berhasil dihapus');
    }
}
