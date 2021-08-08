<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Penebak;
use Illuminate\Http\Request;

class PenebakController extends Controller
{
    public function getCabang($id)
    {
        $penebak = Penebak::all();
        return response()->json(['data' => $penebak], 200);
    }
}
