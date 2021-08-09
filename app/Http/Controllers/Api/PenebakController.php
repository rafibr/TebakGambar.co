<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Penebak;
use Illuminate\Http\Request;

class PenebakController extends Controller
{
    public function getPenebak($id)
    {
        $penebak = Penebak::with('user')->where("id", $id)->first();
        return response()->json($penebak, 200);
    }
}
