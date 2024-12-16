<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return view('home');
    }
    public function search(Request $request)
    {
        $search = $request->input('search');
        $users = User::with('department','designation')
        ->where('name', 'LIKE', "%{$search}%")
        ->orWhereHas('department',fn($query) => $query->where('name','LIKE',"%{$search}%"))
        ->orWhereHas('designation',fn($query) => $query->where('name','LIKE',"%{$search}%"))
        ->get();

        return view('home',['users' => $users,'search' => $search]);
    }
}
