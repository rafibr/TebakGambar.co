<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\RuleBayar;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class RuleController extends Controller
{
    public function getRules()
    {
        $rules = DataTables::of(RuleBayar::all())->toJson();

        return $rules;
    }
}
