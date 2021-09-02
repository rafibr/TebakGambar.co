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
        $penebakTable = Datatables::of(
            Penebak::select('*')
                ->leftjoin(DB::raw('(SELECT t1.id_penebak as val_id_penebak, id_history, keterangan, maxEpoch, status_nilai, jumlah_pembayaran, status_pembayaran FROM validasi_history t1 INNER JOIN( SELECT id_penebak, MAX(epoch) maxEpoch FROM validasi_history GROUP BY id_penebak ) tmp ON t1.id_penebak = tmp.id_penebak AND t1.epoch = tmp.maxEpoch) val'), function ($join) {
                    $join->on('penebak.id_penebak', '=', 'val.val_id_penebak');
                })
                ->where("id_kepala_cabang", $id)
        )
            ->toJson();

        // $penebak = Penebak::where("kepala_cabang", $id)->get();
        return $penebakTable;
    }
}
