<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Roles;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class adminPanel extends Controller
{
    public function index()
    {
        // score | nazwa | opis | miejscowosc | adres... | user
        $posts = DB::table('places')
            ->join('addresses', 'places.address_id', '=', 'addresses.id')
            ->join('posts', 'places.id', '=', 'posts.place_id')
            ->join('ratings', 'posts.rating_id','ratings.id')
            ->join('users', 'users.id', '=', 'posts.user_id')
            ->select('users.name', 'places.name as placeName','ratings.score', 'ratings.description', 
            'addresses.country', 'addresses.voivodeship', 'addresses.city', 'addresses.street',
            'addresses.number', 'places.id as placeId')
            ->paginate(5);

        $users = DB::table('users')
            ->join('roles_user', 'users.id', '=', 'roles_user.user_id')
            ->join('roles', 'roles.id', '=', 'roles_user.roles_id')
            ->select('users.name', 'users.email', 'roles.name as roleName', 'users.id')
            ->orderBy('users.id', 'asc')
            ->paginate(5);

        return view('admin-panel', compact('posts', 'users'));
    }

    public function deactivate(Request $request)
    {
        $id = $request->id;
        $blockedUserRole = Roles::where('name', 'blockedUser')->first();
        $user = User::find($id);

        if($user->isDeac())
            $user->roles()->detach($blockedUserRole);
        else
            $user->roles()->attach($blockedUserRole);
        
        return redirect()->route('admin-panel')->with('success','Visit has been created successfully!');
    }
    public function destroyPost(Request $request)
    {
        $id = $request->id;

        $post = Post::find($id);
        $post->delete();

        return redirect()->route('admin-panel')->with('success','Visit has been created successfully!');
    }
}
