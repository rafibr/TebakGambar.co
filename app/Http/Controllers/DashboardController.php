<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{

    // function for View
    public function homeView()
    {
        return view('dashboard');
    }

    public function userView()
    {
        if (Auth::user()->level == 99)
            return view('cabang');
        else
            return redirect('home');
    }

    public function profileView()
    {
        return view('profile');
    }
    // /. function for View
}
