<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function dashboard()
    {
        if (Auth::check()) {
            $account = Auth::user()->account;
            return view('User.index', compact('account'));
        }

        return redirect()->route('login');
    }

}
