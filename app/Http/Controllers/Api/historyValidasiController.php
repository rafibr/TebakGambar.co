<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\HistoryValidasi;
use Illuminate\Http\Request;
use DataTables;

class historyValidasiController extends Controller
{
    public function getHistory($id)
    {
        $history = Datatables::of(
            HistoryValidasi::select('validasi_history.*', 'validasi_history.id as id_history', 'validasi.tanggal_validasi')
                ->leftJoin('penebak', 'validasi_history.id_penebak', 'penebak.id')
                ->leftJoin('validasi', 'validasi_history.id_validasi', 'validasi.id')
                ->where('id_penebak', $id)
                ->orderBy('epoch', 'desc')
                ->get()
        )->toJson();

        // return response()->json(['data' => $history], 200);
        return $history;
    }
}
