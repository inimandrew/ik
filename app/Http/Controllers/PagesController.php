<?php

namespace App\Http\Controllers;

use App\Models\Plans;
use App\Models\Subscriptions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PagesController extends Controller
{
    public function login(Request $request)
    {
        return view('login');
    }

    public function home(Request $request)
    {
        $recentSubscription = Subscriptions::where('user_id', Auth::user()->id)->latest()->first();
        $plan = Plans::find($recentSubscription->plan_id);
        return view('dashboard.home', ['currentPlan' => $plan]);
    }
}
