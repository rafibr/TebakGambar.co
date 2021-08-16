<?php

namespace App\Http\Controllers;

use App\Models\DompetDigital;
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
        if (Auth::user()->id == $id || Auth::user()->level == 99) {
            $data = User::where("level", '!=', 99)->get();
            $dataDompet = DompetDigital::all();
            return view('profile', ['data' => $data, 'dataDompet' => $dataDompet]);
        } else {
            return redirect('home');
        }
    }
    public function penebakView($id)
    {
        $data = User::where("level", '!=', 99)->get();
        $dataDompet = DompetDigital::all();
        return view('penebak', ['data' => $data, 'dataDompet' => $dataDompet]);
    }

    public function dompetView()
    {
        return view('dompet');
    }

    public function validasiView()
    {
        return view('validasi');
    }

    // public function penebakView()
    // {
    //     return view('penebak');
    // }
    // /. function for View
}
