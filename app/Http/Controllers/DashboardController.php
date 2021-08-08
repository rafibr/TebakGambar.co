<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{

    // function for View
    public function homeView()
    {
        return view('dashboard');
    }

    public function userView()
    {
        return view('users');
    }
    // /. function for View
}
