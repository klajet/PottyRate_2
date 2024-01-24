<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Roles;
use Illuminate\Support\Facades\Auth;

class rolesController extends Controller
{
    public function getRoles()
    {
        // $posts = Post::with('categories')->get();
        return Roles::with('user')->get();
    }

    public function isAdmin()
    {
        // Sprawdź, czy użytkownik jest zalogowany i ma rolę "admin"
        if (Auth::check() && in_array('admin', Auth::user()->roles->pluck('name')->toArray())) {
            return view('admin');
        } else {
            // Jeśli użytkownik nie ma wymaganej roli, możesz przekierować go gdzie indziej lub zwrócić odpowiednią treść
            return redirect('/')->with('error', 'Nie masz dostępu do tej strony.');
        }
    }
}
