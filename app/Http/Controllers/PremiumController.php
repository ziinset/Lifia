<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PremiumController extends Controller
{
    /**
     * Show premium page based on user's premium status
     */
    public function index()
    {
        if (Auth::user()->is_premium) {
            return view('user.premium');
        } else {
            return view('user.nonpremium');
        }
    }

    /**
     * Show premium page (only for premium users)
     */
    public function premium()
    {
        if (Auth::user()->is_premium) {
            return view('user.premium');
        } else {
            return redirect()->route('nonpremium');
        }
    }

    /**
     * Show non-premium page (only for non-premium users)
     */
    public function nonpremium()
    {
        if (!Auth::user()->is_premium) {
            return view('user.nonpremium');
        } else {
            return redirect()->route('premium');
        }
    }
}
