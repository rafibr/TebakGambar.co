<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Validasi;
use DataTables;

class ValidasiController extends Controller
{
    public function getValidasi()
    {
        $validasi = Datatables::of(Validasi::all())->toJson();
        return $validasi;
    }
}
