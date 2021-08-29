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
            HistoryValidasi::select('*')
                ->leftJoin('penebak', 'validasi_history.id_penebak', 'penebak.id_penebak')
                ->where('validasi_history.id_penebak', $id)
                ->orderBy('epoch', 'desc')
                ->get()
        )->toJson();

        // return response()->json(['data' => $history], 200);
        return $history;
    }
}
