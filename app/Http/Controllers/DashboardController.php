<?php

namespace App\Http\Controllers;

use App\Models\User;
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

    public function profileView($id)
    {
        if (Auth::user()->id == $id || Auth::user()->level == 99)
            return view('profile');
        else
            return redirect('home');
    }
    public function penebakView($id)
    {
        $data = User::where("level", '!=', 99)->get();
        return view('penebak',['data' => $data]);
    }
    
    public function penebakView()
    {
        return view('penebak');
    }
    // /. function for View
}
