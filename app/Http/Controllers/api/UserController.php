<?php

namespace App\Http\Controllers\api;

use App\DataTables\UsersDataTable;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function index()
    {
        $users = User::all();
        // return UsersDataTable($users)->make(true);
        return response()->json(['rd' => 'success', 'rc' => '200', 'data' => $users], 200);
        // return response()->json($users);
    }

    public function show($id)
    {
        $user = User::find($id);
        return response()->json(['rd' => 'success', 'rc' => '200', 'data' => $user], 200);
    }
}
