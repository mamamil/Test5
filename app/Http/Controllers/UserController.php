<?php

namespace App\Http\Controllers;

use App\Models\User;

class UserController extends Controller
{
    public function show($id)
    {
        $user = User::with('products')->findOrFail($id);
        return view('users.show', compact('user'));
    }
}
