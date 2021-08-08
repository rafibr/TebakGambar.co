<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Penebak;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function getUsers()
    {
        $users = User::all();

        return response()->json(['data' => $users], 200);
    }

    public function getPenebakCabang($id)
    {
        $penebak = Penebak::where("kepala_cabang", $id)->get();
        return response()->json(['data' => $penebak], 200);
    }
}
