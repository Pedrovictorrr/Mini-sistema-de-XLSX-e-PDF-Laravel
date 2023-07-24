<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index (Request $request) {

        $user = Auth::user();

        if ($user->role == 2) {
            $users = User::all();
        } else {
            $users = User::where('role', 2)->get();
        }

        return response()->json(['data' => $users, 'self' => $user], 200);
    }
}
