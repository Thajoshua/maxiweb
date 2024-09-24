<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Account; // Import the Account model
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        // Create the user
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Now, create the account for the user
        $account = Account::create([
            'user_id' => $user->id, // Ensure this is set
            'balance' => 0,
            'deposits' => 0,
            'withdrawals' => 0,
            'total_profit' => 0,
        ]);

        // Fire the registration event
        event(new Registered($user));

        // Log the user in
        Auth::login($user);

        // Redirect to the dashboard
        return redirect(route('user.dashboard'));
    }



    public function withdraw(Request $request)
{
    $user = Auth::user();
    $userId = $user->id;

    // Check if the user's current balance is less than $20
    if ($user->balance < 20) {
        return redirect()->back()->with('error', 'Your account balance must be at least $20 to withdraw.');
    }

    // Check if the user has a valid, unused, and non-expired pin
    $userPin = \App\Models\UserPin::where('user_id', $userId)
                                   ->where('is_used', false)
                                   ->first();

    if (!$userPin || $userPin->is_used || $userPin->expires_at < now()) {
        return back()->with('error', 'Invalid, used, or expired pin.');
    }

    // Process the withdrawal logic
    // e.g., subtract the withdrawal amount from the balance
    // $withdrawalAmount = $request->input('amount');
    // $user->balance -= $withdrawalAmount;
    // $user->save();

    // Mark the pin as used
    $userPin->update(['is_used' => true]);

    return redirect()->back()->with('success', 'Withdrawal successful.');

}

}
