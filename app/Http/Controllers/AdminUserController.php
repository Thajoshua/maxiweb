<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminUserController extends Controller
{
    public function showLoginForm()
    {
        return view('admin.login');
    }
    public function login(Request $request): RedirectResponse
    {
        // Validate user login credentials
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Attempt to login as a user
        if (Auth::attempt($request->only('email', 'password'))) {
            $request->session()->regenerate();
            return redirect()->route('admin.dashboard'); // Regular user dashboard
        }

        return back()->withErrors([
            'email' => 'Invalid login credentials.',
        ]);
    }
    public function index()
    {
        $users = User::with('account')->get(); // Eager load the account relationship
        return view('admin.index', compact('users'));
    }
    public function users_view(User $user)
    {
        $users = User::with('account')->get(); // Fetch users along with their accounts
        return view('Admin.show', compact('users')); //
    }



    // Update user details
    public function update(Request $request, User $user)
    {
        // Validate the incoming data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'balance' => 'nullable|numeric',
            'deposits' => 'nullable|numeric',
            'withdrawals' => 'nullable|numeric',
        ]);

        // Update the user details (name and email)
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        // Update the account details if they exist
        if ($user->account) {
            $user->account->update([
                'balance' => $request->balance ?? $user->account->balance,
                'deposits' => $request->deposits ?? $user->account->deposits,
                'withdrawals' => $request->withdrawals ?? $user->account->withdrawals,
            ]);

            return redirect()->route('admin.dashboard')->with('success', 'User updated successfully.');
        } else {
            return redirect()->route('admin.dashboard')->with('error', 'User account not found.');
        }
    }

    public function generatePin(Request $request, $userId)
{
    // Generate a random 6-digit pin
    $pin = rand(100000, 999999);

    // Save it to the database for the user
    \App\Models\UserPin::create([
        'user_id' => $userId,
        'pin' => $pin,
        'is_used' => false
    ]);

    return redirect()->back()->with('success', 'Pin generated: ' . $pin);
}

    // Delete a user
    public function destroy(User $user)
    {
        $user->delete(); // This will also delete the associated account if cascade is set up
        return redirect()->route('admin.users.index')->with('success', 'User deleted successfully.');
    }
}
