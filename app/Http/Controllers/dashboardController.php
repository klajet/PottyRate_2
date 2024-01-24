<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Roles;
use Illuminate\Support\Facades\Auth;

class dashboardController extends Controller
{
    public function index()
    {
        $topRole = User::with('roles')->orderBy('id')->take(1)->get();
  
        return view('dashboard')->with('topRole', $topRole);
    }
}
