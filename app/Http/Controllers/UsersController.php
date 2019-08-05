<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Laravel\Passport\Passport;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Auth;


class UsersController extends Controller {
    public function index() {
        $users = User::all();

        return response()->json([
                'status' => 'success',
                'users' => $users
            ], 200);
        
    }

    public function show(Request $request, $id) {
        $user = User::findOrFail($id);
        
        return response()->json([
                'status' => 'success',
                'user' => $user
            ], 200);

        /* $join_attending = DB::table('users')
                            ->where('users.id', '=', $id)
                            ->join('attending', 'users.id', '=', 'attending.user_id')
                            ->select('users.id AS id'); */
    }

    public function return() {
        return Auth::id();
    }
}
