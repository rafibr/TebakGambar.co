<?php

namespace App\Http\Controllers;

use App\Models\DompetDigital;
use App\Models\HistoryValidasi;
use App\Models\RuleBayar;
use App\Models\User;
use App\Models\Validasi;
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

    public function ruleView()
    {
        $data = RuleBayar::all();
        return view('rule', ['data' => $data]);
    }

    public function dompetView()
    {
        return view('dompet');
    }

    public function validasiView()
    {
        return view('validasi');
    }

    public function balanceView($id)
    {
        if (Auth::user()->id == $id || Auth::user()->level == 99) {
            $data = User::where("level", '!=', 99)->get();
            $dataDompet = DompetDigital::all();
            return view('balance', ['data' => $data, 'dataDompet' => $dataDompet]);
        } else {
            return redirect('home');
        }
    }

}
