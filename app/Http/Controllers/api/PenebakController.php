<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Penebak;
use Illuminate\Http\Request;

class PenebakController extends Controller
{
    public function index($id, Request $request)
    {

        $penebak = new Penebak();
        $penebak = $penebak->where('kepala_cabang', $id);


        $key = $request->get('queryParams');
        $query = json_decode($key);

        if (count($query->filters) > 0) {
            foreach (($query->filters) as $filter) {
                $penebak = $penebak->where($filter->name, 'LIKE', '%' . $filter->text . '%');
            }
        }
        if (isset($query->sort[0])) {
            $penebak = $penebak->orderBy($query->sort[0]->name, $query->sort[0]->order);
        }

        // TODO : Adding global search

        $penebak = $penebak->paginate($query->per_page);

        return response()->json($penebak);
    }
}
