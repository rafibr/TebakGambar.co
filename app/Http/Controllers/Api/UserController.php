<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Penebak;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use DataTables;

class UserController extends Controller
{
    public function getUsers()
    {
        $users = Datatables::of(User::all())->toJson();

        // return response()->json(['data' => $users], 200);
        return $users;
    }

    public function getPenebakCabang($id)
    {
        $penebakTable = Datatables::of(Penebak::select('*', 'penebak.id as penebak_id')->join('dompet_digital', 'penebak.tipe_pembayaran',  'dompet_digital.id')->where("kepala_cabang", $id))->toJson();
        // $penebak = Penebak::where("kepala_cabang", $id)->get();
        return $penebakTable;
    }

}
