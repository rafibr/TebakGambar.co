<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\DompetDigital;
use DataTables;

class DompetController extends Controller
{
    public function getDompet()
    {
        $dompet = Datatables::of(DompetDigital::all())->toJson();
        return $dompet;
    }
}
