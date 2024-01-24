<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Roles;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class dashboardController extends Controller
{
    public function index()
    {
        // $topRole = User::with('roles')->orderBy('id')->take(1)->get();
  
        // return view('news')->with('topRole', $topRole);
        
        $posts = DB::table('places')
            ->join('addresses', 'places.address_id', '=', 'addresses.id')
            ->join('posts', 'places.id', '=', 'posts.place_id')
            ->join('ratings', 'posts.rating_id','ratings.id')
            ->join('users', 'users.id', '=', 'posts.user_id')
            ->select('users.name', 'places.name as placeName','ratings.score', 'ratings.description', 
            'addresses.country', 'addresses.voivodeship', 'addresses.city', 'addresses.street',
            'addresses.number', 'places.id as placeId')
            ->where('users.id', '=', Auth::User()->getId())
            ->paginate(10);

        return view('news', compact('posts'));
    }

    public function destroyPost(Request $request)
    {
        $id = $request->id;

        $post = Post::find($id);
        $post->delete();

        return redirect()->route('dashboard')->with('success','Visit has been created successfully!');
    }
}
