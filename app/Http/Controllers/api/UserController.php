<?php

namespace App\Http\Controllers\api;

use App\DataTables\UsersDataTable;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{

    public function index(Request $request)
    {

        $users = new User;


        $key = $request->get('queryParams');
        $query = json_decode($key);

        if (count($query->filters) > 0) {
            foreach (($query->filters) as $filter) {
                $users = $users->where($filter->name, 'LIKE', '%' . $filter->text . '%');
            }
        }
        if (isset($query->sort[0])) {
            $users = $users->orderBy($query->sort[0]->name, $query->sort[0]->order);
        }

        // TODO : Adding global search

        $users = $users->paginate($query->per_page);

        return response()->json($users);

    }

    public function show($id)
    {
        $user = User::find($id);
        return response()->json(['rd' => 'success', 'rc' => '200', 'data' => $user], 200);
    }
}
